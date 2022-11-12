<?php

namespace App\Console\Commands;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For sending emails to users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arg = $this->argument('user');
        $this->comment($arg);
        exit;
        $emailData = [
            'subject' => 'Welcome to LearnVern',
            'body' => 'Welcome to LearnVern. This is the classic example of sending email using Laravel.',
            'tagline' => 'LEARN ANY COURSE FOR FREE IN YOUR OWN LANGUAGE UPDATED.'
        ];
        $users = User::limit(5)->get();
        foreach($users as $user) {
            Mail::to((string) $user->email)
                ->locale('de')
                ->send(new WelcomeEmail($emailData));
        }
    }
}
