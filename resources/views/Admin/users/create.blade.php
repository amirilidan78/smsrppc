@extends('Admin.layout.master')


@section('style')

@endsection


@section('content')

    <div class="card">

        <div class="card-body">

            <div class="clearfix">
                <h3 class="h5 float-right">کاربر جدید</h3>
            </div>

            <form method="post" action="{{ route('admin.users.store') }}" class="row justify-content-center pt-3">
                @csrf
                <div class="col-lg-11">

                    <x-Admin.form.input
                        id="name"
                        name="نام"
                        />

                    <x-Admin.form.input
                        id="phone"
                        name="شماره همراه"
                        />

                    <x-Admin.form.input
                        id="password"
                        name="رمز عبور"
                        />

                    <div class="row mt-4 mb-2">
                        <div class="col-12 text-center">
                            <button class="btn btn-success btn-rounded">ثبت</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

    </div>

@endsection

@section('script')

@endsection


