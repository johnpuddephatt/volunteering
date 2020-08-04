<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

use Backpack\CRUD\CrudTrait;
use Malhal\Geographical\Geographical;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Vinkla\Hashids\Facades\Hashids;
use JustBetter\PaginationWithHavings\PaginationWithHavings;

class Opportunity extends Model
{
    use CrudTrait;
    use Geographical;
    use PaginationWithHavings;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'opportunities';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'organisation_id','active', 'title', 'slug', 'intro', 'description', 'expenses', 'places', 'minimum_age', 'skills_gained', 'requirements', 'skills_needed', 'from_home', 'address', 'address_ward', 'latitude', 'longitude', 'phone', 'email', 'frequency', 'hours', 'start_date', 'end_date', 'deadline'
    ];
    protected $with = ['organisation','categories','accessibilities','suitabilities'];
    // protected $hidden = [];
    protected $casts = [
        'skills_gained' => 'json',
        'skills_needed' => 'json',
        'requirements' => 'array',
        'from_home' => 'boolean',
        'active' => 'boolean',
        // 'start_date' => 'date',
        // 'end_date' => 'date',
        'address' => 'json',
        // 'address_ward' => 'json',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function clearGlobalScopes()
    {
        static::$globalScopes = [];
    }

    protected static function boot()
    {
      parent::boot();
      static::addGlobalScope('active', function (Builder $builder) {
        $builder->where('active', true)
                ->where('validated_at', '>=', Carbon::now()->subDays(config('volunteering.opportunity_valid_for')))
                ->where(function ($query) {
                  $query->where('deadline', '>', Carbon::now())
                  ->orWhereNull('deadline');
                });
      });

      static::saving(function($model) {

        $model->slug = str_slug($model->title) . '-' . ($model->id ?? Cache::get('opportunity_count'));

        if($model->address) {
          $dirty_address = $model->address;

          if(gettype($dirty_address) == 'string') {
            $dirty_address = json_decode($dirty_address,true);
          }

          $model->latitude = $dirty_address['latlng']['lat'];
          $model->longitude = $dirty_address['latlng']['lng'];
          if(isset($dirty_address['postal_code'])) {
            $model->address_ward = $model->getWardData($dirty_address['postal_code']);
          }
        }
        // Sanitize description
        if($model->description) {
          $model->description = strip_tags($model->description, "<h2><h3><p><a><ul><ol><li><b><i>");
          $model->description = str_replace("<p></p>","",$model->description);
          $model->description = str_replace("<p>&nbsp;</p>","",$model->description);
        }


     });

     static::saved(function(){
       \Cache::clear('opportunity_count');
       \Cache::clear('index_suitabilities');
       \Cache::clear('index_categories');
       \Cache::clear('index_organisations');
       \Cache::clear('home_categories');
       \Cache::clear('home_suitabilities');
       \Cache::clear('home_opportunities');
     });


    }

    public function getWardData($postcode) {
        $client = new Client();
        $response = $client->request('GET', 'https://api.postcodes.io/postcodes/' . $postcode);
        $response_body = $response->getBody();

        $response_json = json_decode($response_body, true);
        return $response_json['result']['admin_ward'];
    }

    public function renew() {
      //@todo: check user is Admin or owner
      // if ( unauthorised ) {
      //     return false
      // }
      $this->validated_at = now();
      $this->save();
      return true;
    }

    public function is_new() {
      $created_at = new Carbon($this->created_at);
      $now = Carbon::now();
      $days_since_creation = $created_at->diffInDays($now);
      return ($days_since_creation < config('volunteering.max_days_for_new')) ? true : false;
    }

    public function expires_in() {
      $validated_at = new Carbon($this->validated_at);
      $now = Carbon::now();

      $remaining = config('volunteering.opportunity_valid_for') - $validated_at->diffInDays($now);
      return ($remaining > 0) ? $remaining : false;
    }

    public function date_range() {
      if($this->start_date && ($this->start_date == $this->end_date)) {
        return date("D jS M Y", strtotime($this->start_date));
      }
      elseif($this->start_date && $this->end_date) {
        return date("D jS M", strtotime($this->start_date)) . ' – ' . date("D jS M", strtotime($this->end_date));
      }
      elseif($this->start_date) {
        return 'From ' . date("D jS M Y", strtotime($this->start_date));
      }
      else {
        return 'Flexible';
      }
    }

    public function hash() {
      return Hashids::encode($this->id);
    }

    public function syncRelations($request) {
      if(!empty($request['accessibilities'])) {
        $this->accessibilities()->sync($request['accessibilities']);
      }
      if(!empty($request['categories'])) {
        $this->categories()->sync($request['categories']);
      }
      if(!empty($request['suitabilities'])) {
        $this->suitabilities()->sync($request['suitabilities']);
      }
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function enquiries()
    {
        return $this->morphMany('App\Models\Enquiry', 'enquirable');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function suitabilities()
    {
        return $this->belongsToMany('App\Models\Suitability');
    }

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function accessibilities()
    {
        return $this->belongsToMany('App\Models\Accessibility');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeExpired($query) {
        $query->where('validated_at', '<', Carbon::now()->subDays(config('volunteering.opportunity_valid_for')));
    }

    public function scopeActive($query) {
        $query->where('validated_at', '>=', Carbon::now()->subDays(config('volunteering.opportunity_valid_for')))
              ->where(function ($query) {
                $query->where('deadline', '>', Carbon::now())
                ->orWhereNull('deadline');
              });
    }


    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setAddressAttribute($value) {
      if(gettype($value) == 'string') {
        $this->attributes['address'] = json_decode(json_encode($value),true);
      }
      else {
        $this->attributes['address'] = json_encode($value);
      }
    }

}
