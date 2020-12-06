<?php

namespace App\Http\Controllers\Home;

use App\CodeBase\File\PictureFacade;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Home\is_submitting_middleware;
use App\Http\Requests\PartnerSubmittingDataValidation;
use App\Http\Sessions\PartnerSessionHandler;
use App\Models\UpdatedPartner;
use App\Traits\YearsMonthsDays;

class SubmitController extends Controller
{
    use YearsMonthsDays ;

    public function __construct()
    {
        $this->middleware(is_submitting_middleware::class);
    }

    public function index()
    {
        return view('Home.Partner.submitting_partner_data' ,[
            'user' => PartnerSessionHandler::get_partner() ,
            'temp_owner' => PartnerSessionHandler::get_temp_updated_partner() ,
            'days' => $this->days(),
            'months' => $this->months(),
            'years' => $this->years(),
        ]);
    }

    public function index_post(PartnerSubmittingDataValidation $validation)
    {
        $data = $validation->validated() ;

        $data = PictureFacade::storePartnerPictures($data) ; //return new data with addresses

        UpdatedPartner::create($data);

        alert()->toast('اطلاعات سهام دار با موفقیت تکمیل شد , پس از برسی اطلاعات وارد شده به شما اطلاع رسانی خواهد شد ' ,'success') ;

        PartnerSessionHandler::flush();

        return redirect()->route('home') ;
    }

}
