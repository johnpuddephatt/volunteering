<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{

    protected $table = 'enquiries';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['opportunity_id','name','phone','email','message'];

    public function organisation()
    {
      return $this->belongsTo('App\Models\Opportunity');
    }
}
