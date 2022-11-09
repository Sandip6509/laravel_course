<?php

namespace App\Listeners;

use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{

    public $queue = 'listener';
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        $emailData = [
            'subject' => 'Welcome to LearnVern',
            'body' => 'Welcome to LearnVern. This is the classic example of sending email using Laravel.',
            'tagline' => 'LEARN ANY COURSE FOR FREE IN YOUR OWN LANGUAGE UPDATED.'
        ];
        Mail::to((string) $user->email)
            //->cc('cc_email@mail.com')
            //->bcc('bcc_email@mail.com')
            ->locale('en')
            ->send(new WelcomeEmail($emailData));
    }
}
