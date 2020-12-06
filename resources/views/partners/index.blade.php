@extends('Admin.layout.master')


@section('style')

@endsection


@section('content')

    <div class="card">

        <div class="card-body">

            <div class="clearfix p-2">
                <h3 class="h5 float-right">کاربران</h3>
                <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-rounded float-left">جدید</a>
            </div>

            <div class="row justify-content-center pt-3">
                <div class="col-lg-11">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap text-center">
                            <thead>
                            <tr>
                                <th scope="col">آیدی</th>
                                <th scope="col">نام</th>
                                <th scope="col">شماره همراه</th>
                                <th scope="col">دسترسی ها</th>
                                <th scope="col">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user['id'] }}</th>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['phone'] }}</td>
                                    <td>
                                        @if( !$user->is_super_user() )
                                            <a href="{{ route('admin.users.permissions' ,$user) }}" class="btn btn-secondary btn-md btn-rounded">مدیریت</a>
                                        @else
                                            <span>----</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( !$user->is_super_user() )
                                            <a href="{{ route('admin.users.edit' ,$user) }}" class="btn btn-warning btn-md btn-rounded">ویرایش</a>
                                            <form action="{{ route('admin.users.destroy' ,$user) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button data-toggle="tooltip"  data-placement="top" title="آیا از حذف کاربر مطمعن هستید!؟" class="btn btn-danger btn-md btn-rounded">حذف</button>
                                            </form>
                                        @else
                                            <span>----</span>
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

    </script>
@endsection


