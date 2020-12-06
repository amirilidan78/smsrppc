@extends('Admin.layout.master')

@section('style')
    <script src="{{ asset('js/alphine.js') }}"></script>
@endsection


@section('content')

    <form id="deleteForm"  method="post">
        @method('delete')
        @csrf
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
                        <h5 class="modal-title" id="exampleModalLabel">آیا از حذف پیام مطمعن هستید!؟</h5>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>در صورتی که پیام در حال ارسال باشد , حذف نمیشود .</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">بستن </button>
                        <button type="submit" class="btn btn-danger">تایید</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.jobs.store') }}"  method="post">
        @method('post')
        @csrf
        <div
            class="modal fade"
            id="sendSmsModal"
            tabindex="-1"
            aria-labelledby="sendSmsModal"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ارسال پیام</h5>
                    </div>
                    <div class="modal-body">
                        <x-Admin.form.input
                        colLgLabel="col-lg-3"
                        colLgInput="col-lg-9"
                         id="phone"
                        place="لطفا شماره همراه گیرنده را وارد کنید"
                         name="شماره همراه"
                        />
                        <div class="my-4" x-data="{ smsText : '' }">
                            <label class="form-label" for="smsText">متن پیام</label>
                            <textarea class="form-control" x-model="smsText" placeholder="لطفا متن پیام را اینجا وارد کنید ..." rows="4"></textarea>
                            <input type="hidden" x-model="smsText" name="smsText">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">بستن </button>
                        <button type="submit" class="btn btn-success">ارسال</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card">

        <div class="card-body">

            <div class="clearfix p-2">
                <h3 class="h5 float-right">
                   صف پیام ها
                </h3>
                <button data-toggle="modal" data-target="#sendSmsModal" class="btn btn-success btn-rounded float-left mx-2">ارسال پیام</button>
                <button class="btn btn-primary btn-rounded float-left mx-2"> شارژ سامانه پیامکی {{ $credit }} بلوک </button>
            </div>

            <div class="row justify-content-center pt-3">
                <div class="col-lg-11">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">شماره همراه</th>
                                <th scope="col">متن ارسالی</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col"> تلاش برای ارسال</th>
                                <th scope="col">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if( count($jobs) == 0 )
                                <tr>
                                    <td colspan="6">
                                        هیچ پیامکی در صف وجود ندارد
                                    </td>
                                </tr>
                            @endif

                            @foreach($jobs as $key => $job)
                                @php $jobObject =  $job->getObject()->notification @endphp
                                <tr>
                                    <th scope="row" >{{ ++$key }}</th>
                                    <td> <x-Admin.data.nullable-data :data="$jobObject->phone"/> </td>
                                    <td> <x-Admin.data.nullable-data :data="$jobObject->text"/> </td>
                                    <td>
                                        @if( $job->reserved_at )
                                            <span class="text-warning"> در حال ارسال</span>
                                        @else
                                            <span class="text-muted">در صف انتظار</span>
                                        @endif
                                    </td>
                                    <td>{{ $job['attempts'] }}</td>
                                    <td>
                                        @if( $job['reserved_at'] )
                                            ----
                                        @else
                                            <button data-toggle="modal" data-target="#deleteModal" onclick="setFormAction('{{ $job['id'] }}')" class="btn btn-danger btn-rounded">حذف</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div>

    </div>

@endsection

@section('script')
    <script>
        let arr = [] ;
        @foreach( $jobs as $job )
            arr["{{ $job['id'] }}"] = "{{ route('admin.jobs.destroy' ,$job) }}" ;
        @endforeach

        function setFormAction(id) {
            document.getElementById("deleteForm").action = arr[id] ;
        }
    </script>
@endsection


