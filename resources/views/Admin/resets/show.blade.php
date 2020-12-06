@extends('Admin.layout.master')

@section('style')
    <script src="{{ asset('js/alphine.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
@endsection


@section('content')

    <form action="{{ route('admin.resets.destroy' ,$reset) }}" method="post">
        @csrf
        @method('delete')
        <div
            class="modal fade"
            id="deleteModal"
            tabindex="-1"
            aria-labelledby="deleteModal"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">از حذف و رد درخواست مطمعن هستید !؟</h5>
                    </div>
                    <div class="modal-body">

                        <input
                            class="cursor-pointer check-box-style"
                            type="checkbox"
                            id="deleteDirectory"
                            name="deleteDirectory"  />
                        <label class="user-select-none cursor-pointer" for="deleteDirectory">
                            حذف عکس
                        </label>

                        <div x-data="{checked : false}" class="mt-3">
                            <input
                                class="cursor-pointer check-box-style"
                                type="checkbox"
                                id="modalSms"
                                x-model="checked"  />
                            <label class="user-select-none cursor-pointer" for="modalSms">
                                ارسال پیام به شماره
                                {{ $reset['phone'] }}
                            </label>
                            <template x-if="checked == true" >
                                <div x-data="{deleteSmsText : ''}">
                                    <div class="my-4">
                                        <label class="form-label" for="smsText">متن پیامک</label>
                                        <textarea class="form-control" x-model="deleteSmsText" placeholder="متن پیام ارسالی به سهام دار را اینجا وارد کنید ..." id="modalSmsText" rows="4"></textarea>
                                        <input type="hidden" name="smsText" x-model="deleteSmsText">
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

    <form action="{{ route('admin.resets.update' ,$reset) }}" method="post">
        @csrf
        @method('put')
        <div
            class="modal fade"
            id="acceptModal"
            tabindex="-1"
            aria-labelledby="acceptModal"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">از تایید و ارسال اطلاعات مطمعن هستید !؟</h5>
                    </div>
                    <div class="modal-body">


                        <div x-data="{smsText : ''}">
                            <h5 class="h6 user-select-none" >
                                ارسال پیام به شماره
                                {{ $reset['phone'] }}
                            </h5>

                            <div class="my-4">
                                <label class="form-label" for="smsText">متن پیامک</label>
                                <textarea class="form-control" id="smsTextTextArea" x-model="smsText" placeholder="متن پیام ارسالی ..." rows="4"></textarea>
                                <input type="hidden" id="smsText" name="smsText" x-model="smsText">
                            </div>


                            <input
                                class="cursor-pointer check-box-style mt-1 mr-2"
                                type="checkbox"
                                id="deleteDirectoryUpdate"
                                name="deleteDirectory"  />
                            <label class="user-select-none cursor-pointer" for="deleteDirectoryUpdate">
                                حذف عکس
                            </label>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">بستن </button>
                        <button type="submit" class="btn btn-primary">بله</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card mb-4">

        <div class="card-body ">

            <div class="clearfix p-2">

                <h3 class="h5 float-right">
                    نمایش درخواست بازیابی شماره عضویت
                </h3>

            </div>

            <div class="row justify-content-center py-3 " >
                <div class="col-lg-11">


                    <form class="row justify-content-start">

                        <div class="col-12">


                            <div class="col-lg-1"></div>

                            <div class="col-lg-4">
                                <a target="_blank" >
                                    <img src="{{ $reset['cart_melli_picture'] }}" alt="{{ $reset['name'] }}" class="img-fluid cursor-pointer" onclick="lightBoxImage.show()" >
                                    <script>
                                        //lightbox
                                        const options =  { closable: true } ;
                                        const image = `  <img class='w70 img-fluid' src='{{ $reset['cart_melli_picture'] }}'>  `;
                                        const lightBoxImage = basicLightbox.create(image,options);
                                    </script>
                                </a>
                            </div>

                            <div class="col-12 mt-3"></div>

                            <input type="hidden" name="search" value="1">
                            <x-Admin.form.input :value="request('partner_id')" id="partner_id" place="" name="شماره عضویت"  />
                            <x-Admin.form.input :value="request('name')" id="name" place="" :preVal="$reset['name']" name="نام"  />
                            <x-Admin.form.input :value="request('last_name')" id="last_name" place="" :preVal="$reset['last_name']" name="نام خانوادگی"  />
                            <x-Admin.form.input :value="request('father_name')" id="father_name" place="" :preVal="$reset['father_name']" name="نام پدر"  />
                            <x-Admin.form.input :value="request('phone')" id="phone" place="" :preVal="$reset['phone']" name="شماره همراه"  />
                            <x-Admin.form.input :value="request('code_melli')" id="code_melli" place="" name="کد ملی"  />
                            <x-Admin.form.input :value="request('certificate_id')" id="certificate_id" place="" name="شماره شناسنامه"  />

                            <div class="row mt-4">
                                <div class="col-lg-12 text-center">
                                    <button class="btn btn-primary btn-rounded">جستجو</button>
                                    <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#deleteModal">حذف و رد درخواست</button>
                                </div>
                            </div>

                        </div>

                    </form>

                    @if( request()->search )
                        <hr>

                        <div class="row">

                            @if( count($partners) == 0 )
                                <p class="text-center text-warning">سهام داری با این مشخصات یافت نشد</p>
                            @endif

                            <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap text-center">
                                            <thead>
                                            <tr>
                                                <th scope="col">شماره عضویت</th>
                                                <th scope="col">نام</th>
                                                <th scope="col">نام خانوادگی</th>
                                                <th scope="col">نام پدر</th>
                                                <th scope="col">شماره همراه</th>
                                                <th scope="col">شماره شناسنامه</th>
                                                <th scope="col">کد ملی</th>
                                                <th scope="col">محل تولد</th>
                                                <th scope="col">کد پستی</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($partners as $partner)
                                                <tr>
                                                    <th scope="row">{{ $partner['id'] }}</th>
                                                    <td> <x-Admin.data.nullable-data :data="$partner['name']"/></td>
                                                    <td> <x-Admin.data.nullable-data :data="$partner['last_name']"/></td>
                                                    <td> <x-Admin.data.nullable-data :data="$partner['father_name']"/></td>
                                                    <td> <x-Admin.data.nullable-data :data="$partner['phone']"/></td>
                                                    <td> <x-Admin.data.nullable-data :data="$partner['certificate_id']"/></td>
                                                    <td> <x-Admin.data.nullable-data :data="$partner['code_melli']"/></td>
                                                    <td> <x-Admin.data.nullable-data :data="$partner['birth_place']"/></td>
                                                    <td> <x-Admin.data.nullable-data :data="$partner['post_code']"/></td>
                                                    <td>
                                                        @if( $partner->updated_partner )
                                                            <span class="text-info">اطلاعات جدید موجود است</span>
                                                        @else
                                                            <span class="text-warning">اطلاعات جدید موجود نیست</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary btn-rounded" onclick="setAcceptData('{{ $partner['id'] }}', '{{ $partner['name'] }}',  '{{ $partner['last_name'] }}')" data-toggle="modal" data-target="#acceptModal">ارسال اطلاعات سهام دار</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                        </div>

                    @endif


                </div>
            </div>

        </div>

    </div>

@endsection

@section('script')
    <script>
        function setAcceptData(id ,name ,last_name ,) {
            let text = 'با سلام, اطلاعات سهام دار ' ;
            text += 'شماره عضویت ' +  '`' + id + '` ,'  ;
            text += 'نام' +  '`' + name + '` ,'  ;
            text += 'نام خانوادگی ' +  '`' + last_name + '`'  ;
            document.getElementById('smsTextTextArea').innerText =  text ;
            document.getElementById('smsText').value =  text ;
        }
    </script>


@endsection


