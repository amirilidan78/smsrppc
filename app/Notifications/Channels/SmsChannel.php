<?php


namespace App\Notifications\Channels;


use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class SmsChannel
{
    public function send($notifiable ,Notification $notification)
    {

        if ( !method_exists($notification ,'smsProperties'))
            throw new \Exception('smsProperties not found' ,'500') ;

        $data = $notification->smsProperties($notifiable) ;

        $phone = $data['phone'] ;
        $text = $data['text'] ;

        ini_set("soap.wsdl_cache_enabled", "0");
        try {
            $client = new \SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));
            $parameters['username'] = env('SMS_PHONE_NUMBER');
            $parameters['password'] = env('SMS_PASSWORD');
            $parameters['from'] = env('SMS_FROM');
            $parameters['to'] = array("$phone");
            $parameters['text'] ="$text";
            $parameters['isflash'] = true;
            $parameters['udh'] = "";
            $parameters['recId'] = array(0);
            $parameters['status'] = 0x0;
            $status =  $client->SendSms($parameters)->SendSmsResult;
            if ( $status == 1 )
                return 1 ;
            else{
                Log::error("sms not send to {$phone} , smsText : $text");
                throw new \Exception('ارسال نا موفق' ,'500') ;
            }
        } catch (SoapFault $ex) {
            echo $ex->faultstring;
        }
    }
}
