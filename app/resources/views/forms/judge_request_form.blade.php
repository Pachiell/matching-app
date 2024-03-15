@extends('layouts.layout')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-md-offset-3 col-md-10">
                    <nav class="card mt-5">
                        <div class="card-header custom-card-header d-flex justify-content-center bg-orange">投稿内容</div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-md-7 mt-4 ml-5">
                                    <label for="inputEmail4" class="form-label">タイトル</label>
                                    <input type="text" class="form-control" value="{{ $service['title'] }}"
                                        aria-label="Disabled input example" disabled>
                                </div>
                                <div class="col-md-3 mt-4 ml-2">
                                    <label for="inputPassword4" class="form-label">金額</label>
                                    <div class="d-flex justify-content-center">
                                        <input type="text" class="form-control" value=" {{ $service['amount'] }}"
                                            aria-label="Disabled input example" disabled>
                                        <div class="fs-20">円</div>
                                    </div>
                                </div>
                                <div class="col-md-10 mt-5 ml-5">
                                    <label for="inputPassword4" class="form-label">内容</label>
                                    <textarea class="form-control" aria-label="With textarea" aria-label="Disabled input example" disabled>{{ $service['comment'] }}</textarea>
                                </div>
                                <div class="col-md-6 mt-4 ml-5">
                                    @if (isset($service['image']))
                                        <div>
                                            <label for="inputPassword4" class="form-label">参考画像</label>
                                            <div class="col-md-6 ml-5">
                                                <img src="{{ asset($service['image']) }}" class="w-100">
                                            </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-md-offset-3 col-md-10">
                    <nav class="card mt-5">
                        <div class="card-header custom-card-header d-flex justify-content-center bg-pink">依頼申請</div>
                        <div class="card-body">
                            <form class="row g-4" action="{{ route('edit.request',$request['id'])}}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="col-md-10 mt-5 ml-5">
                                    <label for="inputPassword4" class="form-label">依頼内容</label>
                                    <textarea class="form-control" name="comment" aria-label="With textarea">{{ $request['comment'] }}</textarea>
                                </div>
                                <div class="row col-md-6 mt-4 ml-5 d-flex">
                                    <label for="inputPassword4" class="form-label">メールアドレス(必須)</label>
                                    <input type="email" class="form-control" name="e-mail" value="{{ $request['e-mail'] }}">
                                </div>
                                <div class="row col-md-3 mt-4 ml-5 d-flex">
                                    <label for="inputEmail4" class="form-label">希望納期(任意)</label>
                                    <input type="date" class="form-control" name="deadline" value="{{ $request['deadline'] }}">
                                </div>
                                <div class="row col-md-3 mt-4 ml-5 d-flex">
                                    <label for="inputPassword4" class="form-label">電話番号(任意)</label>
                                    <div class="d-flex justify-content-center">
                                        <input type="tel" class="form-control" name="tel" value="{{ $request['tel'] }}">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5 d-flex justify-content-center">
                                    <button type="submit" class="btn-lg bg-green"><span class="sp-5">変更する</span></button>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
