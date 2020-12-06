@extends('Home.layout.master')


@section('style')

@endsection


@section('content')

    <div class="container ">
        <div class="row justify-content-center">

            <div class="col-12 text-center my-5 ">
                <h1 class="h3">بازیابی شماره عضویت سهام دار</h1>
            </div>

            <div class="col-lg-5 col-md-7 col-10">
                <div class=" alert-info p-3 pt-4 rounded text-center text-dark" role="alert" data-color="primary">
                    <p>
                        پس از ثبت درخواست و تایید اطلاعات توسط تیم پشتیبانی , شماره عضویت سهام دار به شماره وارد شده در فرم زیر ارسال خواهد شد .
                    </p>
                </div>
            </div>

            <form method="post" class="col-lg-8 col-md-9 col-11 my-5" enctype="multipart/form-data">
                @csrf
                <div class="card py-3 pb-2">
                    <div class="card-body text-center">

                        <h3 class="h4 my-3 mb-5">
                            برای بازیابی شماره عضویت  لطفا فرم زیر را تکمیل کنید
                        </h3>

                        <x-form.input
                            name="نام"
                            id="name" />
                        <x-form.input
                            name="نام خانوادگی"
                            id="last_name" />
                        <x-form.input
                            name="نام پدر"
                            id="father_name" />
                        <x-form.input
                            name="شماره همراه"
                            id="phone" />

                        <x-form.file
                            name="عکس کارت ملی"
                            id="cart_melli_picture" />


                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-5 col-md-7 col-10 pb-0">
                               <x-recaptcha.index />
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg btn-rounded my-4">
                            ثبت درخواست
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset("/vendor/sweetalert/sweetalert.all.js") }}"></script>
@endsection


