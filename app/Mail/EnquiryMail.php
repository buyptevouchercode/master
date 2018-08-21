<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $enquiryData;
    public $user_name;
    public $type;
    public function __construct($enquiryData,$type)
    {
        //
        $this->enquiryData = $enquiryData;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->type == 'customer') {
            $to = $this->enquiryData->email;
            $address = 'info@ptepromocode.com';
            $name = 'PTEPromoCode.com';
            $subject = 'Thank you';
            $view = 'emails.enquiry';
        }elseif ($this->type == 'admin') {
            $address = $this->enquiryData->email;
            $name = 'PTEPromoCode.com';
            $subject = $this->enquiryData->name . 'Inquiry';
            $to = 'info@ptepromocode.com';
            $view = 'emails.admin_enquiry';
        }

        return $this->view($view)
            ->to($to)
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);

    }
}
