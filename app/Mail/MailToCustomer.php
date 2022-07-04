<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($visitor_name, $visitor_email, $visitor_mobile , $visitor_message, $ad_name, $ad_id, $contact_name)
    {
        $visitor_name = $this->$visitor_name;
        $visitor_email = $this->$visitor_email;
        $visitor_mobile = $this->$visitor_mobile;
        $visitor_message = $this->$visitor_message;
        $ad_name = $this->$ad_name;
        $ad_id = $this->$ad_id;
        $contact_name = $this->$contact_name;
    }

    /**
     * Build the message.
     *
     * @param $visitor_name
     * @return $this
     */
    public function build($visitor_name, $visitor_email, $visitor_mobile, $visitor_message, $ad_name, $ad_id, $contact_name)
    {
        return $this->view('mail.mail_to_customer',[
            'visitor_name' => $this->$visitor_name,
            'visitor_email' => $this->$visitor_email,
            'visitor_mobile' => $this->$visitor_mobile,
            'visitor_message' => $this->$visitor_message,
            'ad_name' => $this->$ad_name,
            'ad_id' => $this->$ad_id,
            'contact_name' => $this->$contact_name,
        ]);
    }
}
