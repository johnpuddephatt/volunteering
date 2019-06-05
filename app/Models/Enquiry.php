<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Opportunity;

use App\Mail\NewEnquiryNotification;

class Enquiry extends Model
{

    protected $table = 'enquiries';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['opportunity_id','name','phone','email','message'];

    public function opportunity()
    {
      return $this->belongsTo('App\Models\Opportunity');
    }

    public function sendEnquiryNotification() {
      $email = new NewEnquiryNotification($this);
      $recipient = Opportunity::findOrFail($this->opportunity_id)->organisation;
      Mail::to($recipient)->send($email);
    }
}
