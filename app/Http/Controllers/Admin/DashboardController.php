<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\PartnerResetId;
use App\Models\UpdatedPartner;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('Admin.index' ,[
            'countUsers' => User::all()->count() ,
            'countUpdatedPartners' => UpdatedPartner::whereNull('action')->count() ,
            'countPartnerResetIds' => PartnerResetId::all()->count() ,
            'countJobs' => Job::all()->count() ,
        ]) ;
    }
}
