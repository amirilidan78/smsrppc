<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobValidation;
use App\Models\Job;
use App\Notifications\SendSmsNotification;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private function getCredit()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/Send.asmx?wsdl', array('encoding'=>'UTF-8'));

        $parameters['username'] = env('SMS_PHONE_NUMBER');
        $parameters['password'] = env('SMS_PASSWORD');

        return intval($sms_client->GetCredit($parameters)->GetCreditResult) ;
    }

    public function __construct()
    {
        $this->middleware('can:access-jobs');
    }

    public function index()
    {
        return view('Admin.jobs.index',[
            'jobs' => Job::take(15)->get() ,
            'credit' => $this->getCredit()
        ]);
    }

    public function store(StoreJobValidation $validation)
    {
        $data = $validation->validated() ;
        auth()->user()->notify(new SendSmsNotification($data['smsText'] ,$data['phone']));
        alert()->toast('پیام در صف پیام ها قرار گرفت' ,'success');
        return back() ;
    }

    public function destroy(Job $job)
    {
        if ( $job->reserved_at )
        {
            alert()->toast('پیام در حال ارسال غیر قابل حذف است' ,'danger');
        }
        else
        {
            $job->delete();
            alert()->toast('پیام حذف شد' ,'success');
        }
        return back() ;
    }
}
