@extends('Admin.layout.master')


@section('style')

@endsection


@section('content')

    <div class="card">

        <div class="card-body">

            <div class="clearfix">
                <h3 class="h5 float-right">ویرایش کاربر </h3>
            </div>

            <form method="post" action="{{ route('admin.users.update' , $user) }}" class="row justify-content-center pt-3">
                @method('put')
                @csrf
                <div class="col-lg-11">

                    <x-Admin.form.input
                        id="name"
                        name="نام"
                        :value="$user['name']"
                        />

                    <x-Admin.form.input
                        id="phone"
                        name="شماره همراه"
                        :value="$user['phone']"
                        />

                    <x-Admin.form.input
                        id="password"
                        name="رمز عبور"
                        place="رمز عبور جدید را وارد کنید"
                        />

                    <div class="row mt-4 mb-2">
                        <div class="col-12 text-center">
                            <button class="btn btn-warning btn-rounded">به روز رسانی</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

    </div>

@endsection

@section('script')

@endsection


