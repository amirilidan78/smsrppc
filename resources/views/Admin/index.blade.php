@extends('Admin.layout.master')

@section('style')

@endsection

@section('content')

    <div class="card">

        <div class="card-body">

            <div class="clearfix p-2">
                <h3 class="h5 float-right">میز کار</h3>
            </div>


            <div class="row justify-content-center pt-3">
                <div class="col-lg-10">

                    @can('access-users')
                        <h4 class="h6 my-mt-4 mb-5">
                            کاربران
                            :
                            <span class="@if( $countUsers == 1 ) text-warning @else text-success @endif">{{ $countUsers }}</span>
                            عدد
                        </h4>
                    @endcan

                    @can('access-updated-partners')
                        <h4 class="h6 my-5">
                            سهام داران تایید نشده
                            :
                            <span class="@if( $countUpdatedPartners == 0 ) text-success @else text-warning @endif">{{ $countUpdatedPartners }}</span>
                            عدد
                        </h4>
                    @endcan

                     @can('access-partner-reset-ids')
                        <h4 class="h6 my-5">
                            درخواست های منتظر پاسخ
                            :
                            <span class="@if( $countPartnerResetIds == 0 ) text-success @else text-warning @endif">{{ $countPartnerResetIds }}</span>
                            عدد
                        </h4>
                    @endcan

                     @can('access-jobs')
                        <h4 class="h6 my-5">
                            تعداد پیام های در صف ارسال
                            :
                            <span class="@if( $countJobs == 0 ) text-success @else text-warning @endif">{{ $countJobs }}</span>
                            عدد
                        </h4>
                    @endcan
                </div>
            </div>


        </div>

    </div>

@endsection

@section('script')

@endsection


