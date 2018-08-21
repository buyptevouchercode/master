<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $successData;
    public function __construct($successData)
    {
        //
        $this->successData = $successData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $address = 'contactbuypte@gmail.com';
        $name = 'BuyPteVoucher.in';
        if($this->successData['type'] == 'admin') {
            $to = 'info@ptepromocode.com';
            $view = 'emails.success_admin';
            $subject = $this->successData['name'].'Success';
        }elseif ($this->successData['type'] == 'customer'){
            $to = $this->successData['email'];
            $view = 'emails.success_customer';
            $subject = 'BuyPteVoucher Code';
        }elseif($this->successData['type'] == 'send_query'){
            $to = 'info@ptepromocode.com';
            $view = 'emails.customer_contactus';
            $subject = 'Customer Enquiry';
        }elseif ($this->successData['type'] == 'mock_test') {
            $to = $this->successData['email'];
            $view = 'emails.mock_test';
            $subject = 'PTE Mock Test';
        }elseif ($this->successData['type'] == 'agent_mail') {
            $to = $this->successData['email'];
            $view = 'emails.agent';
            $subject = 'Discount Link';
        }elseif ($this->successData['type'] == 'refer') {
            $to = $this->successData['email'];
            $view = 'emails.referfriend';
            $subject = 'PTE Promo Code Refer Friend';
        }

        return $this->view($view)
            ->to($to)
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}
