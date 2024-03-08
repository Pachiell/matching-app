@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="card mt-5">
                    <div class="card-header">パスワード再設定</div>
                    <div class="card-body">
                        <div class="text-left">
                            <p>パスワード再設定用のメールを送信しました</p>
                            <p>メールに記載されているリンクからパスワードの再設定を行ってください</p>
                        </div>
                        <div>
                            <a href="{{ route('login') }}">ログイン画面へ</a>
                        </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
