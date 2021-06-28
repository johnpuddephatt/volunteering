<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Vinkla\Hashids\Facades\Hashids;

class Need extends Model
{

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'needs';

    protected $fillable = [
        'title', 'description', 'contact_email', 'contact_phone', 'accepts_enquiries'
    ];

    protected $casts = [
      'accepts_enquiries' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function hash() {
      return Hashids::encode($this->id);
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

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
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

}
