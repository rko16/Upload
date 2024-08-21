<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $customername;
    public $projectID;
    public $customeradd;
    public $projectcap;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date, $customername, $projectID, $customeradd, $projectcap)
    {
        $this->date = $date;
        $this->customername = $customername;
        $this->projectID = $projectID;
        $this->customeradd = $customeradd;
        $this->projectcap = $projectcap;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: ': Confirmation of Your Solar System Order Booking - Roofsol Home',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.orderconfirmationtouser',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
    public function build()
    {
        return $this->view('email.orderconfirmationtouser')
                    ->subject('Confirmation of Your Solar System Order Booking - Roofsol Home')
                    ->with([
                        'date' => $this->date,
                        'customername' => $this->customername,
                        'projectID' => $this->projectID,
                        'customeradd' => $this->customeradd,
                        'projectcap' => $this->projectcap,
                    ]);
    }
}
