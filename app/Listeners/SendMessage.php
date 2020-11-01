<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Kavenegar\KavenegarApi;
use Predis\Client;

class SendMessage implements ShouldQueue
{

    private $messageHandler;
    private $client;

    public function __construct()
    {
        $this->messageHandler = new KavenegarApi(env('SMS_API'));
        $this->client = new Client();
    }


    public function handle($event)
    {

        $code = $this->client->get($event->phone_number);
        // Send sms with valid account of kaveh negar or something else
//        $this->messageHandler->Send(env('SMS_SENDER'), $event->phone_number, $code);
    }
}
