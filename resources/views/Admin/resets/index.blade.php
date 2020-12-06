@extends('Admin.layout.master')

@section('style')

@endsection


@section('content')


    <div class="card">

        <div class="card-body">

            <div class="clearfix p-2">
                <h3 class="h5 float-right">
                    درخواست های بازیابی شماره عضویت
                </h3>
            </div>

            <div class="row justify-content-center pt-3">
                <div class="col-lg-11">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">نام پدر</th>
                                <th scope="col">شماره همراه</th>
                                <th scope="col">نمایش</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if( count($resets) == 0 )
                                <tr>
                                    <td colspan="6">درخواست جدیدی ثبت نشده</td>
                                </tr>
                            @endif

                            @foreach($resets as $reset)
                                <tr>
                                    <th scope="row">{{ $reset['id'] }}</th>
                                    <td> <x-Admin.data.nullable-data :data="$reset['name']"/></td>
                                    <td> <x-Admin.data.nullable-data :data="$reset['last_name']"/></td>
                                    <td> <x-Admin.data.nullable-data :data="$reset['father_name']"/></td>
                                    <td> <x-Admin.data.nullable-data :data="$reset['phone']"/></td>
                                    <td>
                                        <a href="{{ route('admin.resets.show',$reset) }}" class="btn btn-primary btn-rounded">نمایش</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $resets->links() }}
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


