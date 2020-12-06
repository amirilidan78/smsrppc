<?php

namespace App\Http\Controllers\Home;

use App\CodeBase\File\PictureFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainPageValidation;
use App\Http\Requests\ResetPartnerIdValidation;
use App\Http\Sessions\PartnerSessionHandler;
use App\Models\Partner;
use App\Models\PartnerResetId;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('Home.index');
    }

    public function index_post(MainPageValidation $mainPageValidation)
    {
        PartnerSessionHandler::active_partner_is_authorizing();
        PartnerSessionHandler::put_partner(Partner::find($mainPageValidation['partner_id']));
        alert()->toast('لطفا برای احراز هویت خود فرم زیر را تکمیل کنید', 'warning');
        return redirect()->route('authorizing_partner') ;
    }

    public function support()
    {
        return view('Home.support') ;
    }

    public function reset_user_id()
    {
        return view('Home.reset_user_id') ;
    }

    public function reset_user_id_post(ResetPartnerIdValidation $validation)
    {
        $data = $validation->validated() ;

        Arr::forget($data ,'g-recaptcha-response');

        DB::beginTransaction();

        $reset = PartnerResetId::create($data) ;

        $newData = PictureFacade::storeResetPictures($data ,$reset);

        $reset->update($newData);

        DB::commit();

        alert()->toast('درخواست شما با موفقیت ثبت شد', 'success');
        return redirect()->route('home') ;

    }

}
