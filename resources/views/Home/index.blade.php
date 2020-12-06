@extends('Home.layout.master')


@section('style')

@endsection


@section('content')
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اطلاعات مورد نیاز برای تکمیل اطلاعات سهام دار</h5>
                </div>
                <div class="modal-body">

                    <ul>
                        <li>عکس کارت ملی</li>
                        <li>عکس صفحه اول شناسنامه</li>
                        <li>عکس پایان خدمت (برای خانم ها و آقایان بالای 50 سال و سهام داران فوت شده الزامی نیست)</li>
                        <li>عکس انحصار وراثت (در صورتی که سهام دار فوت شده)</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> متوجه شدم </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row justify-content-center">

            <div class="col-12 text-center my-5 ">
                <h1 class="h3">سیستم متمرکز سهام داران شرکت تعاونی تولید کنندگان پسته رفسنجان</h1>
            </div>

            <div class="col-lg-5 col-md-7 col-10">
                <div class=" alert-info p-3 pt-4 rounded text-center text-dark" role="alert" data-color="primary">
                    <p>
                        لطفا قبل از اقدام برای تکمیل اطلاعات خود ,
                        <a class="text-primary cursor-pointer"
                           data-toggle="modal" data-target="#exampleModal"  ><b>اطلاعات مورد نیاز برای تکمیل اطلاعات سهام دار</b></a>
                        را مطالعه فرمایید
                    </p>
                </div>
            </div>

            <form method="post" class="col-lg-8 col-md-9 col-11 my-5">
                @csrf
                <div class="card py-3 pb-2">
                    <div class="card-body text-center">

                        <div class="row justify-content-center ">
                            <div class="col-lg-8 col-10">
                                <h3 class="h5 my-3 mb-4">
                                    برای تکمیل اطلاعات سهام دار شماره عضویت سهام دار را وارد کنید
                                </h3>
                            </div>
                        </div>

                        <x-form.input
                            name="شماره عضویت"
                            id="partner_id"  />

                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-5 col-md-7 ml-3 col-sm-11 col-12">
                               <x-recaptcha.index />
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg btn-rounded my-4">
                            رهگیری
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('script')

@endsection


