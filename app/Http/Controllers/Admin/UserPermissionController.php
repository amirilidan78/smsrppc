<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:access-users") ;
    }

    public function get(User $user)
    {
        return view('Admin.users.permissions',[
            'user' => $user ,
            'userPermissions' => $user->permissions ,
            'permissions' => Permission::all() ,
        ]) ;
    }

    public function post(Request $request ,User $user)
    {
        $user->syncPermissions($request['user_permissions']) ;
        alert()->toast('دسترسی های کاربر با موفقیت تغییر یافت' ,'success') ;
        return back() ;
    }

}
