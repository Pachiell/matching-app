<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    𝔖𝔖 スキルマッチングα
                </a>
            </div>
            <div class="my-navbar-control">
                @if (Auth::check())
                    <span class="my-navbar-item"><a href="{{ route('profile_form') }}">{{ Auth::user()->name }}</a></span>
                    /
                    <a href="{{ route('logout')}}" id="logout" class="my-navbar-item">ログアウト</a>
                @else
                    <a class="my-navbar-item" href="{{ route('login')}}">ログイン</a>
                    /
                    <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
                @endif
            </div>
        </nav>
        @yield('content')
    </div>
</body>

</html>
