<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use App\Models\Opportunity;

use App\Mail\NewEnquiryNotification;
use Mail;

class Enquiry extends Model
{

    protected $table = 'enquiries';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['enquirable_id','enquirable_type','name','phone','email','message'];

    public function enquirable()
    {
      return $this->morphTo();
    }

    public function sendEnquiryNotification() {
      $email = new NewEnquiryNotification($this);
      $recipient = $this->enquirable->organisation;
      Mail::to($recipient)->send($email);
    }

    public function hash() {
      return Hashids::encode($this->id);
    }
}
