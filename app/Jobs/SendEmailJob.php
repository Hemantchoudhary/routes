<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendEmail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new job instance.P
     *
     * @return void
     */
    
    public function __construct($user)
    {
        // dd($details);
         //dd($user);
        //dd($this->)
       // dd( $user);
        $this->user=$user;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email=new SendEmail($this->user);
       
        //Mail::to($this->user['email'])->send($email);
       // Mail::to("choudharyhemant080@gmail.com")->send($email);
       
       Mail::to($this->user['email'])->queue($email);
    }
}
