@extends('Admin.layout.master')

@section('style')
    <script src="{{ asset('js/alphine.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div
            class="modal fade"
            id="acceptUpdatedPartnerModal"
            tabindex="-1"
            aria-labelledby="acceptUpdatedPartnerModal"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تایید اطلاعات</h5>
                    </div>
                    <div class="modal-body">

                        <div x-data="{checked : false}">
                            <input
                                class="cursor-pointer check-box-style"
                                type="checkbox"
                                id="modalSms"
                                x-model="checked"  />
                            <label class="user-select-none cursor-pointer" for="modalSms">
                                ارسال پیام به شماره
                                {{ $updatedPartner['phone'] }}
                            </label>
                            <template x-if="checked == true">
                                <div>
                                    <div class="my-4">
                                        <label class="form-label" for="smsText">متن پیامک</label>
                                        <textarea class="form-control" placeholder="متن پیام ارسالی به سهام دار را اینجا وارد کنید ..." id="modalSmsText" rows="4"></textarea>
                                    </div>
                                </div>
                            </template>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">بستن </button>
                        <button class="btn btn-success" onclick="acceptData()">بله</button>
                    </div>
                </div>
            </div>
        </div>

    <form method="post" action="{{ route('admin.updatedPartners.destroy' ,$updatedPartner) }}">
        @csrf
        @method('delete')
        <div
            class="modal fade"
            id="rejectUpdatedPartnerModal"
            tabindex="-1"
            aria-labelledby="rejectUpdatedPartnerModal"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">رد و حذف اطلاعات</h5>
                    </div>
                    <div class="modal-body">

                        <input
                            class="cursor-pointer check-box-style "
                            type="checkbox"
                            id="deleteDirectory"
                            name="deleteDirectory"  />
                        <label class="user-select-none cursor-pointer" for="deleteDirectory">
                            حذف عکس های ثبت شده
                        </label>

                        <div x-data="deleteData()" class="mt-2">

                            <input
                                class="cursor-pointer check-box-style"
                                type="checkbox"
                                id="modalSmsDelete"
                                x-model="deleteChecked"  />
                            <label class="user-select-none cursor-pointer" for="modalSmsDelete">
                                ارسال پیام به شماره
                                {{ $updatedPartner['phone'] }}
                            </label>
                            <template x-if="deleteChecked == true">
                                <div>
                                    <div class="my-4">
                                        <label class="form-label" for="smsText">متن پیامک</label>
                                        <textarea class="form-control" x-model="smsText" placeholder="متن پیام ارسالی به سهام دار را اینجا وارد کنید ..." id="modalDeleteSmsText" rows="4"></textarea>
                                        <input type="hidden" x-model="smsText" name="smsText">
                                    </div>
                                </div>
                            </template>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">بستن </button>
                        <button type="submit" class="btn btn-danger">بله</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card mb-4">

        <div class="card-body ">

            <div class="clearfix p-2">
                <h3 class="h5 float-right">
                    ویرایش سهام دار جدید
                    <span class="text-muted">
                    (شماره عضویت {{ $partner['id'] }} )
                    </span>
                </h3>
            </div>

            <form method="post" action="{{ route('admin.updatedPartners.update' ,$updatedPartner) }}" class="row justify-content-center py-3" id="form">
                @csrf
                @method('put')
                <input type="hidden" id="smsText" name="smsText">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="action_at" name="action_at" value="{{ now() }}">
                <div class="col-lg-11">

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

                    <x-Admin.form.input
                        id="name"
                        name=" نام"
                        :preVal="$partner['name']"
                        :value="$updatedPartner['name']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="last_name"
                        name=" نام خانوادگی"
                        :preVal="$partner['last_name']"
                        :value="$updatedPartner['last_name']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="father_name"
                        name=" نام پدر"
                        :preVal="$partner['father_name']"
                        :value="$updatedPartner['father_name']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="certificate_id"
                        name="شماره شناسنامه"
                        :preVal="$partner['certificate_id']"
                        :value="$updatedPartner['certificate_id']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="code_melli"
                        name="کد ملی"
                        :preVal="$partner['code_melli']"
                        :value="$updatedPartner['code_melli']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="birth_place"
                        name="محل تولد"
                        :preVal="$partner['birth_place']"
                        :value="$updatedPartner['birth_place']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="birth_date"
                        name="تاریخ تولد"
                        :preVal="$partner['birth_date']"
                        :value="$updatedPartner['birth_date']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="gender"
                        name="جنسیت"
                        :preVal="$partner['gender']"
                        :value="$updatedPartner['gender']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <hr class="my-5">


                    @if( $updatedPartner['dead_date'] )

                        @if( $updatedPartner['probate_picture'] )
                            <div class="row justify-content-around py-3">
                                <div class="col-lg-4">
                                    <img class="img-fluid cursor-pointer" src="{{ $updatedPartner['probate_picture'] }}" onclick="probate_picture.show()" alt="عکس یافت نشد">
                                    <p class="mt-2">عکس انحصار وراثت</p>
                                </div>
                            </div>
                        @endif

                        <x-Admin.form.input
                            id="dead_date"
                            name="تاریخ فوت"
                            :value="$updatedPartner['dead_date']"
                            colLgLabel="col-lg-4"
                            colLgInput="col-lg-7"
                        />

                        <x-Admin.form.input
                            id="dead_description"
                            name="توضیحات وارث"
                            :value="$updatedPartner['dead_description']"
                            colLgLabel="col-lg-4"
                            colLgInput="col-lg-7"
                        />

                        <hr class="my-5">
                    @endif

                    <x-Admin.form.input
                        id="phone"
                        name="شماره همراه"
                        :preVal="$partner['phone']"
                        :value="$updatedPartner['phone']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="address"
                        name="آدرس"
                        :preVal="$partner['address']"
                        :value="$updatedPartner['address']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    <x-Admin.form.input
                        id="post_code"
                        name="کد پستی"
                        :preVal="$partner['post_code']"
                        :value="$updatedPartner['post_code']"
                        colLgLabel="col-lg-4"
                        colLgInput="col-lg-7"
                    />

                    @if( $partner['shaba'] )
                        <x-Admin.form.input
                            id="shaba"
                            name="شبا"
                            :preVal="$partner['shaba']"
                            :value="$updatedPartner['shaba']"
                            colLgLabel="col-lg-4"
                            colLgInput="col-lg-7"
                        />
                    @endif

                    <div class="row mt-4 py-3">
                        <div class="col-12 text-center">
                            <button type="button" data-toggle="modal" data-target="#rejectUpdatedPartnerModal"
                                class="btn btn-danger btn-rounded btn-lg">رد کردن و حذف اطلاعات</button>
                            <button type="button" data-toggle="modal" data-target="#acceptUpdatedPartnerModal"
                                    class="btn btn-success btn-rounded btn-lg">تایید و به روزرسانی اطلاعات</button>
                        </div>
                    </div>

                </div>
            </form>


        </div>

    </div>

@endsection

@section('script')
    <script>

        function acceptData() {
            try {
                document.getElementById("action").value =  'accepted' ;
                document.getElementById("smsText").value =  document.getElementById("modalSmsText").value ;
            }catch (e) {
                // do nothing
            }
            document.getElementById("form").submit();
        }

        function deleteData() {
            return {deleteChecked : false , smsText : 'tst' };
        }



    </script>


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


