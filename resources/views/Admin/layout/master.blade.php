@extends('Layout.master')


@section('master_style')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @yield('style')
@endsection

@section('master_content')

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">
                پنل مدیریت
            </a>

            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link "
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img class="img-fluid" src="{{ auth()->user()->getAvatar() }}" alt="avatar">
                    </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-center" href="#">{{ auth()->user()->name }}</a></li>
                        <li><a class="dropdown-item text-center" href="{{ route('auth.logout') }}"  {{ isActive('auth.logout') }}>خروج</a> </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <div class="container">

        <div class="row">

            <div class="col-12 responsive-admin-margin" ></div>

            <div class="col-lg-4">
                <div class="list-group">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ isActive('admin.dashboard') }} " aria-current="true">میز کار</a>

                    @can('access-users')
                    <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action {{ isActive('admin.users.index') }}">کاربران</a>
                    @endcan

                    @can('access-partners')
                        <a href="{{ route('admin.partners.index') }}" class="list-group-item list-group-item-action {{ isActive('admin.partners.index') }}">سهام داران قدیمی</a>
                    @endcan

                    @can('access-updated-partners')
                        <a href="{{ route('admin.updatedPartners.index') }}" class="list-group-item list-group-item-action {{ isActive('admin.updatedPartners.index') }}">سهام داران جدید</a>
                    @endcan

                    @can('access-partner-reset-ids')
                        <a href="{{ route('admin.resets.index') }}" class="list-group-item list-group-item-action {{ isActive('admin.resets.index') }}">درخواست های بازیابی</a>
                    @endcan

                    @can('access-jobs')
                        <a href="{{ route('admin.jobs.index') }}" class="list-group-item list-group-item-action {{ isActive('admin.jobs.index') }}">صف پیام ها</a>
                    @endcan

                    <a href="{{ route('auth.logout') }}" class="list-group-item list-group-item-action" {{ isActive('auth.logout') }}>خروج</a>
                </div>
            </div>

            <div class="col-lg-8">
                @yield('content')
            </div>

        </div>

    </div>


@endsection


@section('master_script')
    @yield('script')
@endsection
