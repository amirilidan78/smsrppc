@extends('Admin.layout.master')

@section('style')
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
@endsection


@section('content')

    <div class="card">

        <div class="card-body">

            <div class="clearfix p-2">

                <h3 class="h5 float-right">
                    نمایش سهام دار جدید
                    <span class="text-muted">
                    (شماره عضویت {{ $partner['id'] }} )
                    </span>
                </h3>

            </div>

            <div class="row justify-content-center py-3" >

                <div class="col-lg-11">

                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-7 col-10">

                            @if( $updatedPartner['smsText'] )
                                <div class=" alert-info p-3 pt-4 rounded  text-dark " role="alert" data-color="primary">
                                    <h3 class="h6 text-center">متن ارسال شده</h3>
                                    <p class="h6 text-right">
                                        {{ $updatedPartner['smsText'] }}
                                    </p>
                                </div>
                            @else
                                <div class=" alert-warning p-3 pt-4 rounded  text-dark " role="alert" data-color="primary">
                                    <h3 class="h6 text-center">متنی ارسال نشده</h3>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="row justify-content-around py-3">
                        @if($updatedPartner['men_card_service_picture'])
                            <div class="col-lg-4 text-center text-muted">
                                <img class="img-fluid cursor-pointer" src="{{ $updatedPartner['men_card_service_picture'] }}" onclick="men_card_service_picture.show()" alt="عکس یافت نشد">
                                <p class="mt-2">عکس پایان خدمت</p>
                            </div>
                        @endif

                        @if($updatedPartner['certificate_id_picture'])
                            <div class="col-lg-4 text-center text-muted">
                                <img class="img-fluid cursor-pointer" src="{{ $updatedPartner['certificate_id_picture'] }}" onclick="certificate_id_picture.show()" alt="عکس یافت نشد">
                                <p class="mt-2">عکس شناسنامه</p>
                            </div>
                        @endif

                        @if($updatedPartner['national_card_picture'])
                            <div class="col-lg-4 text-center text-muted">
                                <img class="img-fluid cursor-pointer" src="{{ $updatedPartner['national_card_picture'] }}" onclick="national_card_picture.show()" alt="عکس یافت نشد">
                                <p class="mt-2">عکس کارت ملی</p>
                            </div>
                        @endif
                    </div>

                    <h3 class="h5">
                        <span class="text-muted h6"> نام</span> :
                        {{ $updatedPartner['name'] }}
                    </h3>

                    <h3 class="h5">
                        <span class="text-muted h6"> نام خانوادگی</span> :
                        {{ $updatedPartner['last_name'] }}
                    </h3>

                    <h3 class="h5">
                        <span class="text-muted h6"> نام پدر</span> :
                        {{ $updatedPartner['father_name'] }}
                    </h3>


                    <h3 class="h5">
                        <span class="text-muted h6">شماره شناسنامه</span> :
                        {{ $updatedPartner['certificate_id'] }}
                    </h3>


                    <h3 class="h5">
                        <span class="text-muted h6">کد ملی</span> :
                        {{ $updatedPartner['code_melli'] }}
                    </h3>

                    <h3 class="h5">
                        <span class="text-muted h6">محل تولد</span> :
                        {{ $updatedPartner['birth_place'] }}
                    </h3>


                    <h3 class="h5">
                        <span class="text-muted h6">تاریخ تولد</span> :
                        {{ $updatedPartner['birth_date'] }}
                    </h3>


                    <h3 class="h5">
                        <span class="text-muted h6">جنسیت</span> :
                        {{ $updatedPartner['gender'] }}
                    </h3>


                    <hr class="my-5">

                    @if( $updatedPartner['dead_date'] )

                        @if( $updatedPartner['probate_picture'] )
                            <div class="row justify-content-around py-3">
                                <div class="col-lg-4">
                                    <img class="img-fluid" src="{{ asset($updatedPartner['probate_picture']) }}" alt="عکس یافت نشد">
                                </div>
                            </div>
                        @endif

                        <h3 class="h5">
                            <span class="text-muted h6">تاریخ فوت</span> :
                            {{ $updatedPartner['dead_date'] }}
                        </h3>


                        <h3 class="h5">
                            <span class="text-muted h6">توضیحات وارث</span> :

                            {{ $updatedPartner['dead_description'] }}
                        </h3>


                        <hr class="my-5">
                    @endif

                    <h3 class="h5">
                        <span class="text-muted h6">شماره همراه</span> :
                        {{ $updatedPartner['phone'] }}
                    </h3>



                    <h3 class="h5">
                        <span class="text-muted h6">آدرس</span> :
                        {{ $updatedPartner['address'] }}
                    </h3>


                    <h3 class="h5">
                        <span class="text-muted h6">کد پستی</span> :
                        {{ $updatedPartner['post_code'] }}
                    </h3>

                    @if( $updatedPartner['shaba'] )
                        <h3 class="h5">
                            <span class="text-muted h6">شبا</span> :
                            {{ $updatedPartner['shaba'] }}
                        </h3>
                    @endif


                </div>
            </div>

        </div>

    </div>

@endsection

@section('script')
    <script>
        const options =  { closable: true } ;

        const men_card_service_image = `  <img class='w70 img-fluid cursor-pointer' src='{{ $updatedPartner['men_card_service_picture'] }}'>  `;
        const men_card_service_picture = basicLightbox.create(men_card_service_image,options);

        const certificate_id_image = `  <img class='w70 img-fluid cursor-pointer' src='{{ $updatedPartner['certificate_id_picture'] }}'>  `;
        const certificate_id_picture = basicLightbox.create(certificate_id_image,options);

        const national_card_image = `  <img class='w70 img-fluid cursor-pointer' src='{{ $updatedPartner['national_card_picture'] }}'>  `;
        const national_card_picture = basicLightbox.create(national_card_image,options);

        const probate_image = `  <img class='w70 img-fluid cursor-pointer' src='{{ $updatedPartner['probate_picture'] }}'>  `;
        const probate_picture = basicLightbox.create(probate_image,options);

    </script>
@endsection


