<?php

namespace App\Mail;

use App\Models\Organisation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrganisationActivationNotification extends Mailable
{

  use Queueable, SerializesModels;

  public $organisation;

  /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct(Organisation $organisation)
   {
       $this->organisation = $organisation;
   }


  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
    {
      return $this->subject('Your account has been activated')->markdown('emails.organisationactivated');
    }
}
