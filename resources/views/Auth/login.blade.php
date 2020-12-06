@extends('Auth.layout.master')


@section('style')

@endsection


@section('content')


    <div class="container ">
        <div class="row justify-content-center">


            <form method="post" class="col-lg-8 col-md-10 col-11 my-5">
                @csrf
                <div class="card py-3 pb-2">
                    <div class="card-body text-center">

                        <div class="row justify-content-center ">
                            <div class="col-lg-8 col-10 my-4">
                                <h1 class="h3">ورود کاربران</h1>
                            </div>
                        </div>

                        <x-form.input
                            name="شماره همراه"
                            id="phone"  />

                        <x-form.input
                            name="رمز عبور"
                            type="password"
                            id="password"  />

                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-4 col-md-7 ml-3 col-sm-11 col-12">
                               <x-recaptcha.index />
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg btn-rounded my-4">
                            ورود
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('script')

@endsection


