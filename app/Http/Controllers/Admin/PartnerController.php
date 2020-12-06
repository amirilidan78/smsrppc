<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:access-partners');
    }

    public function index(Request $request)
    {
        $partners = Partner::query() ;

        if ( $request->search )
            $partners = $partners->where('id' ,"$request->search")->orWhere('name' ,'like' ,"%$request->search%")->orWhere('last_name' ,'like' ,"%$request->search%")->orWhere('code_melli' ,'like' ,"%$request->search%")->orWhere('phone' ,'like' ,"%$request->search%")->orWhere('certificate_id' ,'like' ,"%$request->search%") ;

        return view('Admin.partners.index' ,[
            'partners' => $partners->paginate(15)
        ]);
    }

}
