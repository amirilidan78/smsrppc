@extends('Admin.layout.master')


@section('style')

@endsection


@section('content')

    <div class="card">

        <div class="card-body">


            <div class="clearfix p-2">
                <h3 class="h5 float-right">دسترسی های {{ $user->name }}</h3>
            </div>


            <form method="post"  class="row justify-content-center " enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">

                    <div class="row justify-content-start mt-3">
                        <div class="col-lg-6 col-md-8 col-8">
                            @if( count($userPermissions) > 0 )
                                <ul>
                                    @foreach( $userPermissions as $permission )
                                        <li>{{ $permission['label'] }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>کاربر به هیچ قسمتی دسترسی ندارد</p>
                            @endif
                        </div>
                    </div>


                    <div class="clearfix pt-3 mt-3">
                        <h3 class="h5 float-right">ویرایش دسترسی های {{ $user->name }}</h3>
                    </div>


                    <div class="row justify-content-start mt-4">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3 col-md-4 col-4 pt-1">
                            <label for="user_permissions">دسترسی های کاربر</label>
                        </div>
                        <div class="col-lg-6 col-md-8 col-8">
                            <select class="js-choice  @error("user_permissions") is-invalid @enderror" id="user_permissions" name="user_permissions[]" multiple>
                                @foreach( $permissions as $permission )
                                    <option {{ $userPermissions->contains($permission) ? 'selected' : '' }} value="{{ $permission['id'] }}">{{ $permission['label'] }}</option>
                                @endforeach
                            </select>
                            <x-errors.inputError  errorType="user_permissions"/>
                        </div>
                    </div>


                    <div class="row mt-4 mb-2">
                        <div class="col-12 text-center">
                            <button class="btn btn-secondary btn-rounded">به روز رسانی</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

    </div>

@endsection

@section('script')
    <script>
        // Pass single element
        const element = document.querySelector('.js-choice');
        const choices = new Choices(element ,{
            removeItems: true,
            removeItemButton: true,
            loadingText: 'در حال بارگذاری',
            noResultsText: 'هیچ چیزی یافت نشد',
            noChoicesText: 'همه دسترسی ها انتخاب شده اند',
            itemSelectText: 'برای افزودن کلیک کنید',
        });
    </script>
@endsection


