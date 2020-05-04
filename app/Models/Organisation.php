<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\CrudTrait;
use Malhal\Geographical\Geographical;
use Vinkla\Hashids\Facades\Hashids;
use Mail;

use App\Models\Admin;
use App\Mail\NewOrganisationNotification;
use App\Mail\OrganisationActivationNotification;

use JustBetter\PaginationWithHavings\PaginationWithHavings;

class Organisation extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use CrudTrait;
    use Geographical;
    use PaginationWithHavings;

    protected $table = 'organisations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name','slug','contact_name', 'contact_role', 'email', 'password', 'phone', 'info', 'website', 'logo', 'photo', 'active','is_covid_centre','covid_description', 'address', 'latitude', 'longitude',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'email_verified_at' => 'datetime',
      'address' => 'json',
      'is_specialised' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function opportunities()
    {
        return $this->hasMany('App\Models\Opportunity');
    }

    public function needs()
    {
        return $this->hasMany('App\Models\Need');
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    protected static function boot()
    {
      parent::boot();

      static::saving(function($model) {
        $model->slug = str_slug($model->name);

        if($model->address) {
          $dirty_address = $model->address;

          if(gettype($dirty_address) == 'string') {
            $dirty_address = json_decode($dirty_address,true);
          }

          $model->latitude = $dirty_address['latlng']['lat'];
          $model->longitude = $dirty_address['latlng']['lng'];

        }

      });
      static::saved(function(){
        \Cache::clear('index_organisations');
      });
    }

    public function hash() {
      return Hashids::encode($this->id);
    }

    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";
        $disk = "public";
        $destination_path = "logos";

        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (starts_with($value, 'data:image')) {
            $image = \Image::make($value)->resize(200, 200)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            $this->attributes[$attribute_name] = 'storage/' . $destination_path.'/'.$filename;
        }
    }

    public function setPhotoAttribute($value)
    {
        $attribute_name = "photo";
        $disk = "public";
        $destination_path = "photos";

        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (starts_with($value, 'data:image')) {
            $image = \Image::make($value)->resize(335, 192)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            $this->attributes[$attribute_name] = 'storage/' . $destination_path.'/'.$filename;
        }
    }

    public function notifyAdminOfAccountCreation() {
      $email = new NewOrganisationNotification($this);
      $admins = Admin::all();
      Mail::to($admins)->send($email);
    }

    public function notifyOrganisationOfActivation() {
      $email = new OrganisationActivationNotification($this);
      Mail::to($this->email)->send($email);
    }

    public function activate() {
      $this->active = 1;
      $this->save();
      $this->notifyOrganisationOfActivation();
    }

    public function deactivate() {
      $this->active = 0;
      $this->save();
    }

    /*
    * Mutators
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
