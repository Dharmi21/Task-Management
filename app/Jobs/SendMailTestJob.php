<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailTest;



class SendMailTestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    protected $token;


    /**
     * Create a new job instance.
     */
    public function __construct($token,$data)
    {
        $this->token = $token;

        $this->data=$data;

    }


    public function handle(): void
    {
        // $email=new SendMailTest();

        Mail::to($this->data['email'])->send(new SendMailTest($this->token));
    }
}
