@extends('Layout.master')



@section('master_style')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @yield('style')
@endsection

@section('master_content')

    <header>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand @if( request()->routeIs('home') ) active @else text-muted @endif"  href="{{ route("home") }}">
                    <img class="img-fluid ml-2" width="60px" src="{{ asset('images/logo.png') }}" alt="لوگو شرکت پسته">
                    صفحه اصلی
                </a>

                <button
                    class="navbar-toggler "
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <x-icons.side-bar />
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @if( request()->routeIs('reset_user_id') ) active @endif" href="{{ route('reset_user_id') }}">بازیابی شماره عضویت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if( request()->routeIs('support') ) active @endif" href="{{ route('support') }}">ارتباط با پشتیبانی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://rppcshop.ir">فروشگاه شرکت تعاونی پسته رفسنجان</a>
                        </li>

                    </ul>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->

    </header>

    @yield('content')

@endsection


@section('master_script')
    @yield('script')
@endsection
