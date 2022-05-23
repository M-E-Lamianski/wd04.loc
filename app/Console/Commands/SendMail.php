<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\RandomLanguageMail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command send a message';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*
        $languages = ['ru', 'by', 'en'];
        $randomLanguage = $languages[array_rand($languages)];
        */

        $languages = array_slice(scandir(__DIR__ . '/../../../resources/lang'), 2);
        $randomLanguage = $languages[array_rand($languages)];

        App::setLocale($randomLanguage);
        $user = User::inRandomOrder()->first();
        $message = __('messages.welcome');

        $randomLanguageMail = new RandomLanguageMail($message);
        Mail::to($user->mail)->queue($randomLanguageMail);
        $this->info("You sent message $message to $user->email");

        return 0;
    }
}
