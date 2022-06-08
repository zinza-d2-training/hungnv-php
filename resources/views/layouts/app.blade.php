<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/toastr.min.css') }}">
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/toastr.min.js') }}"></script>
    @stack('css')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/lib.js') }}"></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 relative" style="min-height: 850px">
    @include('layouts.navigation')
    <div class="flex flex-col jusctify-center w-1/6 absolute right-0">
        <script>
            @if(Session::has('message'))
                toastr.options =
                {
                    "closeButton": true
                }
                @if(Session::get('status') == 'success')
                    toastr.success("{{ session('message') }}");
                @elseif(Session::get('status') == 'error')
                    toastr.error("{{ session('error') }}");
                @elseif(Session::get('status') == 'info')
                    toastr.info("{{ session('info') }}");
                @elseif(Session::get('status') == 'warning')
                    toastr.warning("{{ session('warning') }}");
                @endif
            @endif
        </script>
    </div>
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    @include('layouts.footer')
</div>
@stack('js')
<script>

</script>
</body>
</html>
