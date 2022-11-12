<?php

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('email:user {user?*} {--O|option=*}', function ($user='default') {
    $arg = $this->argument('user');
    $opt = $this->option('option');
    echo "<pre>";
    print_r($opt);
    exit;
    $this->comment($arg);
    exit;
    $emailData = [
        'subject' => 'Welcome to Sandeep',
        'body' => 'Welcome to Sandeep. This is the classic example of sending email using Laravel.',
        'tagline' => 'LEARN ANY COURSE FOR FREE IN YOUR OWN LANGUAGE UPDATED.'
    ];
    $users = User::limit(2)->get();
    foreach($users as $user) {
        $this->comment('Sending email to ' . (string) $user->email);
        Mail::to((string) $user->email)->locale('en')->send(new WelcomeEmail($emailData));
    }
    $this->comment('Emails sent.');
})->purpose('sending Email through closure command.');

Artisan::command('command:io', function(){
    // Ask Method
    // $name = $this->ask('What is your name?');
    // $this->comment('Your name is ' . $name);
    // Secret Method
    // $password = $this->secret("What is the password?");
    // $this->comment('Your password is ' . $password);
    // Confirm Method
    // $confirm = $this->confirm('Do you wish to continue?');
    // $confirm = $this->confirm('Do you wish to continue?', true);
    // $this->comment('Your answer is '. $confirm);
    // Anticipate Method
    // $name = $this->anticipate('What is your name?',['Taylor','Dayle']);
    // $this->comment('Your answer is '. $name);
    // Choice Method
    // $name = $this->choice('What is your name?',['Taylor','Dayle'],0);
    // $this->comment('Your answer is '. $name);
    // Basic Outputs
    // $this->info('This is info method!');
    // $this->newLine();
    // $this->error('This is info method!');
    // $this->newLine(2);
    // $this->line('This is info method!');
    // $this->newLine(3);
    // $this->comment('This is info method!');
    // Table
    // $headers = ['First Name','Last Name','Email'];
    // $users = User::all(['first_name','last_name','email']);
    // $this->table($headers,$users);
    // Progress Bar
    $this->output->progressStart(10);
    for($i = 0; $i < 10; $i++){
        $this->output->progressAdvance();
    }
    $this->output->progressFinish();
});
