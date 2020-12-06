@extends('errors.layout.master')

@section('content')
    <div class="container-fluid bg-white" style="height: 90vh">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-8 col-sm-10 col-12">
                <img class="img-fluid" src="{{ asset('images/401.jpg') }}" alt="Not Found">
            </div>

            <div class="col-12" style="height: 8vh"></div>

            <div class="col-12 text-center">
                <h1 class="h2">دسترسی غیر مجاز</h1>
            </div>

            <div class="col-12" style="height: 5vh"></div>
            <div class="col-12 mt-4 text-center">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary btn-rounded" >بازگشت به صفحه ی قبل</a>
            </div>
        </div>
    </div>
@endsection
