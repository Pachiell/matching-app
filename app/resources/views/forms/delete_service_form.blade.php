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
                        <div class="card-header custom-card-header d-flex justify-content-center bg-red">登録内容削除</div>
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('delete.service',$result['id'])}}" enctype="multipart/form-data" method="POST">
                                <div class="col-md-7 mt-4 ml-5">
                                    <label for="post-title" class="form-label">タイトル</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $result['title'] }}" disabled>
                                </div>
                                <div class="col-md-3 mt-4 ml-2">
                                    @csrf
                                    <label for="amount" class="form-label">金額</label>
                                    <div class="d-flex justify-content-center">
                                    <input type="text" class="form-control" name="amount" id="amount" value="{{ $result['amount'] }}" disabled>
                                    <div class="fs-20">円</div>
                                    </div>
                                </div>
                                <div class="col-md-10 mt-5 ml-5">
                                    <label for="comment" class="form-label">内容</label>
                                    <textarea class="form-control" name="comment" id="comment" aria-label="With textarea" disabled>{{ $result['comment'] }}</textarea>
                                </div>
                                @if(isset($result['image']))
                                <div>
                                    <label for="post-title" class="form-label col-md-6 mt-4 ml-5">添付ファイル</label>
                                <div class="col-md-6 ml-5">
                                    <img src="{{ asset($result['image']) }}" class="w-100">
                                </div>
                                @endif
                                <div class="col-md-12 mt-5 d-flex justify-content-center">
                                    <button type="submit" class="btn-lg bg-red"><span class="sp-5">削除する</span></button>
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
