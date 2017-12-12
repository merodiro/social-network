<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        
        @yield('content')

        @if (Auth::check())
            <notification></notification>
        @endif

        <audio id="noty_audio">
            <source src="{{ asset('audio/notify.mp3') }}">
            <source src="{{ asset('audio/notify.ogg') }}">
            <source src="{{ asset('audio/notify.wav') }}">
        </audio>
    </div>

    @if (config('app.debug'))
        @include('sudosu::user-selector')
    @endif

    <!-- Scripts -->
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    {{-- <script src="{{ mix('js/manifest.js') }}"></script> --}}
    {{-- <script src="{{ mix('js/vendor.js') }}"></script> --}}
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        @if (Session::has('success'))
            noty('{{ Session::get('success') }}');
        @endif
    </script>
</body>
</html>
