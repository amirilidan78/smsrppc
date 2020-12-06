<?php

namespace App\Notifications;

use App\Notifications\Channels\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class SendSmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $text;
    public $phone;

    public function __construct($text ,$phone)
    {
        $this->text = $text;
        $this->phone = $phone;
    }

    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    public function smsProperties($notifiable)
    {
        return [
            'phone' => $this->phone ,
            'text' => $this->text ,
        ];

    }

}
