<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? "سامانه متمرکز شرکت تعاونی پسته رفسنجان" }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}"></script>
        @yield('master_style')
    </head>
    <body class="bg-light">

        @yield('master_content')

        @yield('master_script')

        @include('sweetalert::alert')

    </body>
</html>
