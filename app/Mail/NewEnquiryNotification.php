<?php

namespace App\Mail;

use App\Models\Enquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewEnquiryNotification extends Mailable
{

  use Queueable, SerializesModels;

  public $enquiry;

  /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct(Enquiry $enquiry)
   {
       $this->enquiry = $enquiry;
   }


  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
    {
      return $this->replyTo($this->enquiry['email'])->subject('New enquiry received')->markdown('emails.newenquiry');
    }
}
