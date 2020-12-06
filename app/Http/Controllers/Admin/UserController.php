<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserValidation;
use App\Http\Requests\Admin\UpdateUserValidation;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:access-users") ;
    }

    public function index()
    {
        return view('Admin.users.index' ,[
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('Admin.users.create');
    }

    public function store(StoreUserValidation $validation)
    {
        $user = User::create($validation->validated());
        alert()->toast('کاربر با موفقیت ایجاد شد' ,'success') ;
        return redirect()->route('admin.users.permissions' ,$user) ;
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('Admin.users.edit' ,[
            'user' => $user
        ]);
    }

    public function update(UpdateUserValidation $validation ,User $user)
    {
        $user->update($validation->validated());
        alert()->toast('مشخصات کاربر با موفقیت به روزرسانی شد' ,'success') ;
        return back() ;
    }

    public function destroy(User $user)
    {
        if ( $user->is_super_user() )
            alert()->toast('مدیر کل غیر قابل حذف است' ,'error') ;
        else{
            $user->delete() ;
            alert()->toast('کاربر با موفقیت حذف شد' ,'success') ;
        }
        return back() ;
    }
}
