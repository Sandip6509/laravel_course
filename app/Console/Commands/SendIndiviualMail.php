<?php

namespace App\Console\Commands;

use App\Mail\WelcomeEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendIndiviualMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:ind_email {user} {--opt}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For sending indivisual email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $args = $this->arguments();
        $opts = $this->options();
        $email = $args['user']->email;
        $emailData = [
            'subject' => 'Welcome to Sandeep',
            'body' => 'Welcome to Sandeep. This is the classic example of sending email using Laravel.',
            'tagline' => 'LEARN ANY COURSE FOR FREE IN YOUR OWN LANGUAGE UPDATED.'
        ];
        Mail::to((string) $email)
            ->locale('en')
            ->send(new WelcomeEmail($emailData));
    }
}
