<?php

namespace App\Http\Controllers\Admin;

use App\CodeBase\File\PictureFacade;
use App\Exports\UpdatedPartnersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatedPartnerValidation;
use App\Models\UpdatedPartner;
use App\Notifications\SendSmsNotification;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UpdatedPartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:access-updated-partners');
    }

    public function index(Request $request)
    {
        $partners = UpdatedPartner::query()->orderBy('action' ,'asc') ;

        if ( $request->search )
            $partners = $partners->where('id' ,"$request->search")->orWhere('name' ,'like' ,"%$request->search%")->orWhere('last_name' ,'like' ,"%$request->search%")->orWhere('code_melli' ,'like' ,"%$request->search%")->orWhere('phone' ,'like' ,"%$request->search%")->orWhere('certificate_id' ,'like' ,"%$request->search%") ;

        return view('Admin.updated_partners.index' ,[
            'partners' => $partners->orderBy('action' ,'desc')->paginate(15)
        ]);
    }

    public function show(UpdatedPartner $updatedPartner)
    {
        return view('Admin.updated_partners.show' ,[
            'partner' => $updatedPartner->partner ,
            'updatedPartner' => $updatedPartner
        ]) ;
    }

    public function edit(UpdatedPartner $updatedPartner)
    {
        if ( $updatedPartner->action ) // necessary
            return redirect()->route('admin.updatedPartners.show' ,$updatedPartner);

        return view('Admin.updated_partners.edit' ,[
            'partner' => $updatedPartner->partner ,
            'updatedPartner' => $updatedPartner
        ]) ;
    }

    public function update(UpdatedPartnerValidation $validation, UpdatedPartner $updatedPartner)
    {
        if ( $updatedPartner->action ) // necessary
            return redirect()->route('admin.updatedPartners.show' ,$updatedPartner);

        $validatedData = $validation->validated() ;

        if ( $validatedData['smsText'] )
            $updatedPartner->notify( new SendSmsNotification($validatedData['smsText'] ,$updatedPartner['phone']) );

        $updatedPartner->update($validatedData) ;
        alert()->toast('اطلاعات سهام دار با موفقیت تایید و به روزرسانی شد' ,'success');
        return redirect(route('admin.updatedPartners.index')) ;
    }

    public function destroy(UpdatedPartner $updatedPartner ,Request $request)
    {
        if ( $request->smsText )
            $updatedPartner->notify( new SendSmsNotification($request->smsText ,$updatedPartner['phone']) );

        $request['deleteDirectory'] ? PictureFacade::deleteFileDirectory($updatedPartner->getAttributes()["national_card_picture"]) : null;

        $updatedPartner->delete() ;
        alert()->toast('اطلاعات سهام دار با موفقیت حذف شد' ,'success') ;
        return redirect(route('admin.updatedPartners.index')) ;
    }

    public function excelExport(Request $request)
    {
        if ( is_null($request->start_date) || is_null($request->end_date) ){
            alert()->toast('تاریخ شروع یا تاریخ پایان نمیتواند خالی باشد' ,'error');
            return back() ;
        }

        if ( $request->start_date < $request->end_date ){
            alert()->toast('تاریخ شروع نمیتواند کمتر از تاریخ پایان باشد' ,'error');
            return back() ;
        }

        $partners = UpdatedPartner::whereAction('accepted')->where('action_at', '>', now()->subDays($request->start_date))->where('action_at', '<', now()->subDays($request->end_date))->get()->toArray();

        return Excel::download(new UpdatedPartnersExport($partners) ,'partners.xlsx');
    }
}
