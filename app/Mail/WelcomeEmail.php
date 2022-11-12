<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $emailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->from('sandippatel3101@gmail.com','Sandeep')
                ->replyTo('sandippatel3101@gmail.com','Support sandeep')
                ->view('text_mail')
                ->attach(public_path('demo.pdf'), [
                    'as' => 'Demo PDF File.pdf',
                    'mime' => 'application/pdf'
                ])
                ->attach(public_path('image.png'), [
                    'as' => 'Demo Image.png'
                ]);
    }
}
