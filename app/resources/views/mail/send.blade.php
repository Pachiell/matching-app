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
    <div class="container">
        <div class="row">
            <div class="">
                <nav class="mt-3">
                    <div class="">スキルマッチングサービス「パスワード再設定」メールをお送りいたします。</div>
                    <div class="">
                        <div>
                            <p><a href="{{ $url }}">こちら</a>にアクセスし、パスワード再設定の手続きをお願いいたします。</p>
                            <p>URLの有効期限は60分です</p>
                        </div>
                        <div class="text-left mt-3">
                            <div>このメールにお心当たりがない場合、他のユーザーが間違えて<br>あなたのメールアドレスを入力した可能性があります</div>
                            <div>※本メールの削除をお願いいたします。</div>
                        </div>
                        <div class="text-left mt-5">
                            <div>＜ご注意＞</div>
                            <div>本メールは自動配信でお届けしています。</div>
                            <div>ご不明な点がある場合、下記よりご連絡ください。</div>
                        </div>
                        <div class="text-left mt-5">
                            <div>○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○</div>
                            <div>お問い合わせ：matching.app.info310@gmail.com</div>
                            <div>○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○⚫︎○</div>
                        </div>
                </nav>
            </div>
        </div>
    </div>
</body>
