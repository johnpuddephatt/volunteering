<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

use Backpack\CRUD\CrudTrait;
use Carbon\Carbon;

class Opportunity extends Model
{
    use CrudTrait;

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
        'active', 'title', 'description', 'expenses', 'places', 'skills_gained', 'requirements', 'skills_needed', 'from_home', 'address', 'address_ward', 'phone', 'email', 'frequency', 'hours', 'start_date', 'end_date'
    ];
    protected $with = ['organisation','categories','accessibilities','suitabilities'];
    // protected $hidden = [];
    protected $casts = [
        'skills_gained' => 'array',
        'skills_needed' => 'array',
        'requirements' => 'array',
        'from_home' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'address' => 'json'
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
        $builder->where('validated_at', '>=', Carbon::now()->subDays(30));
      });

      static::created(function($model) {
        $model->slug = str_slug($model->title);
        $model->save();
      });
    }

    public function renew() {
        //todo: check user is Admin or owner
        // if ( unauthorised ) {
        //     return false
        // }
        $this->validated_at = now();
        $this->save();
        return true;
    }

    public function expires_in() {
        $validated_at = new Carbon($this->validated_at);
        $now = Carbon::now();
        $remaining = 30 - $validated_at->diffInDays($now);
        return ($remaining > 0) ? $remaining : false;
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
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
        $query->where('validated_at', '<', Carbon::now()->subDays(30));
    }
    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getSlugAttribute() {
      return Str::slug($this->title);
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
