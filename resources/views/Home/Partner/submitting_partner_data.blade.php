@extends('Home.layout.master')


@section('style')

@endsection


@section('content')


    <div class="container ">
        <div class="row justify-content-center">

            <form method="post" class="col-lg-9 col-md-10 col-11 my-5" enctype="multipart/form-data">
                @csrf
                <div class="card py-3">
                    <div class="card-body text-center">

                        <div class="row justify-content-center text-right">
                            <div class="col-lg-8">
                                <h3  class="h4 pb-3">اطلاعات حقیقی</h3>
                                <ul >
                                    <li > <p class="text-muted">لطفا اطلاعات حقیقی سهام دار را کامل طبق <b>شناسنامه</b> وارد نمایید . </p> </li>
                                    @if( $temp_owner['is_dead'] )
                                        <li > <p class="text-muted">در توضیحات وارث ها اطلاعات وارث ها(نام ,نام خانوادگی , کد ملی و ...) را وارد کنید .</p> </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <input type="hidden" name="gender" value="{{ $temp_owner['gender'] }}">
                        <input type="hidden" name="birth_date">
                        <input type="hidden" name="partner_id" value="{{ \App\Http\Sessions\PartnerSessionHandler::get_partner()['id'] }}">
                        <input type="hidden" name="dead_date">
{{--                        <input type="hidden" name="is_dead" value="{{ $temp_owner['is_dead'] }}">--}}

                        <x-form.input
                            name="نام"
                            id="name"
                            :value="$user->name" />

                        <x-form.input
                            name="نام خانوادگی"
                            id="last_name"
                            :value="$user->last_name" />

                        <x-form.input
                            name="نام پدر"
                            id="father_name"
                            :value="$user->father_name" />

                        <x-form.input
                            name="کد ملی"
                            id="code_melli"
                            :value="$user->code_melli" />

                        <x-form.input
                            name="شماره شناسنامه"
                            id="certificate_id"
                            :value="$user->certificate_id" />

                        <x-form.select
                            name="سال تولد"
                            id="birth_year"
                            :list="$years"/>

                        <x-form.select
                            name="ماه تولد"
                            id="birth_month"
                            :list="$months"/>

                        <x-form.select
                            name="روز تولد"
                            id="birth_day"
                            :list="$days" />

                        <x-form.input
                            name="محل تولد"
                            id="birth_place"  />

                        @if( $temp_owner['is_dead'] )
                            <x-form.select
                                name="سال فوت"
                                id="dead_year"
                                :list="$years"/>

                            <x-form.select
                                name="ماه فوت"
                                id="dead_month"
                                :list="$months"/>

                            <x-form.select
                                name="روز فوت"
                                id="dead_day"
                                :list="$days" />


                            <x-form.input
                                name="توضیحات وارث ها"
                                id="dead_description"
                                place="لطفا توضیحات وارث را وارد کنید" />

                        @endif

                        <div class="row my-4"> </div>


                        <div class="row justify-content-center text-right">
                            <div class="col-lg-8">
                                <h3  class="h4 pb-3">اطلاعات تکمیلی</h3>
                                <ul>
                                    <li > <p class="text-muted">در صورتی که سهام دار در <b>قید حیات</b> است شماره همراه باید به نام <b>ایشان</b> باشد در غیر اینصورت اطلاعات وارد شده <b>رد</b> میشوند .</p> </li>
                                    <li > <p class="text-muted">شماره شبا <b>اختیاری</b> است و شما میتوانید خالی بگذارید .</p> </li>
                                </ul>
                            </div>
                        </div>

                        <x-form.input
                            name="شماره همراه"
                            id="phone"
                            place="لطفا شماره همراه خود را وارد کنید (09131911111)"
                            :value="$user->phone" />

                        <x-form.input
                            name="آدرس"
                            id="address"
                            :value="$user->address" />

                        <x-form.input
                            name="کد پستی"
                            id="post_code"
                            :value="$user->post_code" />

                        <x-form.input
                            name="شماره شبا (اختیاری)"
                            id="shaba"
                            place="لطفا شماره شبای خود را وارد کنید" />

                        <div class="row my-4"> </div>

                        <div class="row justify-content-center text-right">
                            <div class="col-lg-8">
                                <h3  class="h4 pb-3">مدارک</h3>
                                <ul>
                                    <li > <p class="text-muted"> عکس پایان خدمت برای آقایان بالای 50 سال اجباری نیست .</p> </li>
                                    <li > <p class="text-muted">فرمت های مجاز برای عکس ها (jpg ,jpeg ,png ,bmp ,svg ,webp) .</p> </li>
                                    <li > <p class="text-muted">حداکثر سایز عکس مجاز 2 مگابایت است .</p> </li>
                                </ul>
                            </div>
                        </div>

                        <x-form.file
                            name="عکس کارت ملی"
                            id="national_card_picture" />

                        <x-form.file
                            name="عکس صفحه ی اول شناسنامه"
                            id="certificate_id_picture" />

                        @if( $temp_owner['gender'] == 'مرد' && $temp_owner['is_dead'] == false )
                            <x-form.file
                                name="عکس پایان خدمت"
                                id="men_card_service_picture" />
                        @endif

                        @if( $temp_owner['is_dead'] == true )
                            <x-form.file
                                name="عکس انحصار وراثت"
                                id="probate_picture" />
                        @endif

                        <div class="row justify-content-center my-3">
                            <div class="col-lg-8 text-center">
                                <a href="{{ route('flush') }}" class="btn btn-warning btn-lg btn-rounded mt-4">
                                    انصراف
                                </a>
                                <button class="btn btn-primary btn-lg btn-rounded mt-4">
                                    ثبت
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset("/vendor/sweetalert/sweetalert.all.js") }}"></script>

    @if( $errors->any() )
        <script>
            let text = '' ;

            @foreach( $errors->all() as $error )
                text += "{{ $error }} ," ;
            @endforeach

            Swal.fire({
                title: 'خطا',
                icon: 'error',
                text: text,
                confirmButtonText: 'متوجه شدم',
            })
        </script>
    @endif
@endsection


