<?php

namespace App\Jobs\v1\Email;

use App\Mail\v1\VerificationCodeEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendVerificationCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $type;

    public function __construct($user, $type)
    {
        $this->user = $user;
        $this->type = $type;
    }

    public function handle()
    {
        Redis::throttle('emailVerification')->allow(2)->every(1)->then(function () {
            Mail::to($this->user->email)->send(new VerificationCodeEmail($this->user, $this->type));
        }, function () {
            return $this->release(2);
        });
    }
}
