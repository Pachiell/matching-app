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
                        <div class="card-header custom-card-header d-flex justify-content-center">新規登録</div>
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('create.service')}}" enctype="multipart/form-data" method="POST">
                                <div class="col-md-7 mt-4 ml-5">
                                    <label for="post-title" class="form-label">タイトル</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                                <div class="col-md-3 mt-4 ml-2">
                                    @csrf
                                    <label for="amount" class="form-label">金額</label>
                                    <div class="d-flex justify-content-center">
                                    <input type="text" class="form-control" name="amount" id="amount">
                                    <div class="fs-20">円</div>
                                    </div>
                                </div>
                                <div class="col-md-10 mt-5 ml-5">
                                    <label for="comment" class="form-label">内容</label>
                                    <textarea class="form-control" name="comment" id="comment" aria-label="With textarea"></textarea>
                                </div>
                                <div class="col-md-6 mt-4 ml-5">
                                    <label for="image" class="form-label">画像選択(任意)</label>
                                    <input type="file" class="row mt-2 ml-3" name="image" id="image">
                                </div>
                                <div class="col-md-12 mt-5 d-flex justify-content-center">
                                    <button type="submit" class="btn-lg bg-orange"><span class="sp-5">投稿する</span></button>
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
