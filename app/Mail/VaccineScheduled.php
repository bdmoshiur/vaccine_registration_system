<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VaccineScheduled extends Mailable
{
    use Queueable, SerializesModels;

    protected $registration;

    public function __construct($registration)
    {
        $this->registration = $registration;
    }

    public function build()
    {
        return $this->subject('Your Vaccine Appointment Scheduled')
                    ->view('emails.vaccine_scheduled')
                    ->with(['registration' => $this->registration]);
    }
}
