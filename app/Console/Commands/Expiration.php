<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

// to add expiration date for users which their payment has ended by send to users message for that
class Expiration extends Command
{
    // first put name of your command
    protected $signature = 'user:expire';


    //second the description of your command
    protected $description = 'expire users every minute automatically';


    // code
    public function handle()
    {
        $users = User::where('expire', 0)->get(); //collection of users;
        foreach ($users as $users) {
            $users-> update(['expire'=>1]); //update every active users to ended their payments
        }
    }
}
