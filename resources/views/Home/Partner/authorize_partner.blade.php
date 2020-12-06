@extends('Home.layout.master')


@section('style')

@endsection


@section('content')


    <div class="container ">
        <div class="row justify-content-center">

            <form method="post" class="col-lg-8 col-md-9 col-11 my-5">
                @csrf
                <div class="card py-3">
                    <div class="card-body text-center">

                        <h3  class="h4 pb-3">
                            فرم احراز هویت سهام دار
                        </h3>

                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-2 col-md-3 col-4 pt-1">
                                <label for="name">نام</label>
                            </div>
                            <div class="col-lg-6 col-md-7 col-8">
                                <select class="form-control @error('name') is-invalid @enderror " id="name" name="name">
                                    @foreach( $sampleNames as $name )
                                        <option {{ old('name') == $name ? 'selected' : '' }} value="{{ $name }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <x-errors.inputError  errorType="name"/>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-2 col-md-3 col-4 pt-1">
                                <label for="last_name">نام خانوادگی</label>
                            </div>
                            <div class="col-lg-6 col-md-7 col-8">
                                <select class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name">
                                    @foreach( $sampleLastNames as $lastName )
                                        <option {{ old('last_name') == $lastName ? 'selected' : '' }} value="{{ $lastName }}">{{ $lastName }}</option>
                                    @endforeach
                                </select>
                                <x-errors.inputError  errorType="last_name"/>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-2 col-md-3 col-4 pt-1">
                                <label for="gender">جنسیت</label>
                            </div>
                            <div class="col-lg-6 col-md-7 col-8">
                                <select class="form-control @error('gender') is-invalid @enderror " id="gender" name="gender">
                                    <option value="مرد">مرد</option>
                                    <option value="زن">زن</option>
                                </select>
                                <x-errors.inputError  errorType="gender"/>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-2 col-md-3 col-4 pt-1">
                                <label for="is_dead">وضعیت حیات</label>
                            </div>
                            <div class="col-lg-6 col-md-7 col-8">
                                <select class="form-control @error('is_dead') is-invalid @enderror " id="is_dead" name="is_dead">
                                    <option value="0">در قید حیات</option>
                                    <option value="1">فوت شده</option>
                                </select>
                                <x-errors.inputError  errorType="is_dead"/>
                            </div>
                        </div>


                        <div class="row justify-content-center mt-3">

                            <div class="col-lg-10">
                                <a href="{{ route('flush') }}" class="btn btn-warning btn-lg btn-rounded mt-4">
                                    انصراف
                                </a>

                                <button class="btn btn-primary btn-lg btn-rounded mt-4">
                                    مرحله بعدی
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

@endsection


