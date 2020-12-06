<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Home\is_authorizing_middleware;
use App\Http\Requests\PartnerAuthorizingValidation;
use App\Http\Sessions\PartnerSessionHandler;
use App\Traits\UsersSampleNamesAndLastNames;

class AuthorizingController extends Controller
{

    use UsersSampleNamesAndLastNames ;

    public function __construct()
    {
        $this->middleware(is_authorizing_middleware::class);
    }

    public function index()
    {
        return view('Home.Partner.authorize_partner' ,[
            'sampleNames' => $this->sampleNames() ,
            'sampleLastNames' => $this->sampleLastNames() ,
        ]) ;
    }

    public function index_post(PartnerAuthorizingValidation $userAuthorizing)
    {
        $data = $userAuthorizing->all() ;

        PartnerSessionHandler::put_temp_updated_partner([
            'gender' =>  $data['gender'] ,
            'is_dead' =>  $data['is_dead'] ,
        ]);

        PartnerSessionHandler::active_partner_is_submitting();
        toast('احراز هویت شما با موفقیت انجام شد .','success');
        return redirect()->route('submitting_partner_data');
    }
}
