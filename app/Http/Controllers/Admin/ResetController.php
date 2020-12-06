<?php

namespace App\Http\Controllers\Admin;

use App\CodeBase\File\PictureFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DestroyResetValidation;
use App\Http\Requests\Admin\UpdateResetValidation;
use App\Models\Partner;
use App\Models\PartnerResetId as Reset;
use App\Notifications\SendSmsNotification;
use Illuminate\Http\Request;

class ResetController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:access-updated-partners');
    }

    private function searchForPartner($request){

        $query = Partner::query() ;

        if ( $request->partner_id ){
            return $query->where('id' ,$request->partner_id)->get() ;
        }

        if ( $request->name ){
            $query = $query->where( 'name' , 'like' ,"%$request->name%") ;
        }

        if ( $request->last_name ){
            $query = $query->where( 'last_name' , 'like' ,"%$request->last_name%") ;
        }

        if ( $request->father_name ){
            $query = $query->where( 'father_name' , 'like' ,"%$request->father_name%") ;
        }

        if ( $request->phone ){
            $query = $query->where( 'phone' , 'like' ,"%$request->phone%") ;
        }

        if ( $request->code_melli ){
            $query = $query->where( 'code_melli' ,"$request->code_melli") ;
        }

        if ( $request->certificate_id ){
            $query = $query->where( 'certificate_id' ,"$request->certificate_id") ;
        }

        return  $query->paginate(20) ;

    }

    public function index()
    {
        return view('Admin.resets.index' ,[
            'resets' => Reset::paginate(15)
        ]);
    }

    public function show(Reset $reset ,Request $request)
    {

        $partners = [] ;

        if ( $request->search ){
            $partners = $this->searchForPartner($request) ;
        }

        return view('Admin.resets.show' ,[
            'reset' => $reset ,
            'partners' => $partners ,
        ]);
    }

    public function update(UpdateResetValidation $validation, Reset $reset)
    {
        $data = $validation->validated() ;

        @$data['deleteDirectory'] ? PictureFacade::deleteFileDirectory($reset->getAttributes()["cart_melli_picture"]) : null;

        auth()->user()->notify( new SendSmsNotification( $data['smsText'],$reset['phone']));

        $reset->delete() ;
        alert()->toast('درخواست با موفقیت تایید شد' ,'success');
        return redirect()->route('admin.resets.index') ;
    }

    public function destroy(Reset $reset ,DestroyResetValidation $validation)
    {
        $data = $validation->validated() ;

        @$data['deleteDirectory'] ? PictureFacade::deleteFileDirectory($reset->getAttributes()["cart_melli_picture"]) : null;

        if ( $data['smsText'] ?? null )
            auth()->user()->notify( new SendSmsNotification( $data['smsText'],$reset['phone']));

        $reset->delete() ;
        alert()->toast('درخواست با موفقیت حذف شد' ,'success');
        return redirect()->route('admin.resets.index') ;
    }

}
