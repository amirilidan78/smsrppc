@extends('Admin.layout.master')

@section('style')

@endsection


@section('content')

    <form>
        <div
            class="modal fade"
            id="searchModal"
            tabindex="-1"
            aria-labelledby="searchModal"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">جستجو در سهام داران قدیمی</h5>
                    </div>
                    <div class="modal-body">

                        <x-Admin.form.input
                            name="جستجو"
                            id="search"
                            :value="request()->search"
                        />

                        <p class="mt-3">فیلد های قابل جستجو</p>
                        <ul>
                            <li>شماره عضویت</li>
                            <li>نام</li>
                            <li>نام خانوادگی</li>
                            <li>شماره همراه</li>
                            <li>کد ملی</li>
                            <li>شماره شناسنامه</li>
                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">بستن </button>
                        <button type="submit" class="btn btn-primary">جستجو</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card">

        <div class="card-body">

            <div class="clearfix p-2">
                <h3 class="h5 float-right">
                    سهام داران قدیمی
                    @if( request()->search )
                        (جستجوی :{{ request()->search }}  )
                    @endif
                </h3>
                <button data-toggle="modal" data-target="#searchModal" class="btn btn-primary btn-rounded float-left mx-2">جستجو</button>
                @if( request()->search )
                   <a href="{{ route('admin.partners.index') }}" class="btn btn-info btn-rounded float-left mx-2">نمایش همه</a>
                @endif
            </div>

            <div class="row justify-content-center pt-3">
                <div class="col-lg-11">

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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $partners->links() }}
                    </div>

                </div>
            </div>


        </div>

    </div>

@endsection

@section('script')
    <script>

    </script>
@endsection


