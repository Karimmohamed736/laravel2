<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify users every day automatically';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
            // $users2 = User::select('email')->get(); 
            $emails = User::pluck('email')->toArray();
            $data = ['title'=> 'programming','body'=> 'php'];
            foreach ($emails as $email) {
                Mail::To($email)->send(new NotifyEmail($data));
            }
        
    }
}
