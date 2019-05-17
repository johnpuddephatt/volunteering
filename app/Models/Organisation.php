<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\CrudTrait;
use Mail;

use App\Models\Admin;
use App\Mail\NewOrganisationNotification;
use App\Mail\OrganisationActivationNotification;

class Organisation extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use CrudTrait;

    protected $table = 'organisations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name','slug','contact_name', 'contact_role', 'email', 'password', 'phone', 'info', 'website', 'logo', 'photo', 'active'
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
      });
      static::saved(function(){
        \Cache::clear('index_organisations');
      });
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
            $image = \Image::make($value)->resize(200, 200)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            $this->attributes[$attribute_name] = 'storage/' . $destination_path.'/'.$filename;
        }
    }

    public function notifyAdminOfAccountCreation($organisation) {
      $email = new NewOrganisationNotification($organisation);
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
}
