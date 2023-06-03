<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestoreMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($testMailData)
    {
        //
        $this->testMailData = $testMailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $data['title'] = $this->testMailData['title'];
        $data['mail_message'] = $this->testMailData['body'];
        return $this->subject('restore on Mallline.io')->view('mail.restore_mail', $data);
    }
}
