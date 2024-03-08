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
                        <div class="card-header custom-card-header d-flex justify-content-center bg-green">登録内容編集</div>
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('edit.service',$result['id'])}}" enctype="multipart/form-data" method="POST">
                                <div class="col-md-7 mt-4 ml-5">
                                    <label for="post-title" class="form-label">タイトル</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $result['title'] }}">
                                </div>
                                <div class="col-md-3 mt-4 ml-2">
                                    @csrf
                                    <label for="amount" class="form-label">金額</label>
                                    <div class="d-flex justify-content-center">
                                    <input type="text" class="form-control" name="amount" id="amount" value="{{ $result['amount'] }}">
                                    <div class="fs-20">円</div>
                                    </div>
                                </div>
                                <div class="col-md-10 mt-5 ml-5">
                                    <label for="comment" class="form-label">内容</label>
                                    <textarea class="form-control" name="comment" id="comment" aria-label="With textarea">{{ $result['comment'] }}</textarea>
                                </div>
                                @if(isset($result['image']))
                                <div>
                                    <label for="post-title" class="form-label col-md-6 mt-4 ml-5">添付ファイル</label>
                                <div class="col-md-6 ml-5">
                                    <img src="{{ asset($result['image']) }}" class="w-100">
                                </div>
                                @endif
                                <div class="col-md-6 mt-4 ml-5">
                                    <label for="image" class="form-label">画像選択(任意)</label>
                                    <input type="file" class="row mt-2 ml-3" name="image" id="image">
                                </div>
                                <div class="col-md-12  d-flex justify-content-center">
                                    <a href="{{ route('create_service_form')}}">
                                    <button type="submit" class="btn-lg bg-green"><span class="sp-5">変更する</span></button>
                                    </a>
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
