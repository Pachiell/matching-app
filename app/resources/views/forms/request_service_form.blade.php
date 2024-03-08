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
                                    <input type="text" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-md-3 mt-4 ml-2">
                                    <label for="inputPassword4" class="form-label">金額</label>
                                    <div class="d-flex justify-content-center">
                                    <input type="text" class="form-control" id="inputPassword4">
                                    <div class="fs-20">円</div>
                                    </div>
                                </div>
                                <div class="col-md-10 mt-5 ml-5">
                                    <label for="inputPassword4" class="form-label">内容</label>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="col-md-6 mt-4 ml-5">
                                    <label for="inputPassword4" class="form-label">参考画像</label>
                                    <input type="file" class="row mt-2 ml-3" id="inputGroupFile02">
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
                        <div class="card-header custom-card-header d-flex justify-content-center">依頼申請</div>
                        <div class="card-body">
                            <form class="row g-4">
                                <div class="col-md-10 mt-5 ml-5">
                                    <label for="inputPassword4" class="form-label">依頼内容</label>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="row col-md-6 mt-4 ml-5 d-flex">
                                    <label for="inputPassword4" class="form-label">メールアドレス(必須)</label>
                                    <input type="email" class="form-control" id="inputPassword4">
                                </div>
                                <div class="row col-md-3 mt-4 ml-5 d-flex">
                                    <label for="inputEmail4" class="form-label">希望納期</label>
                                    <input type="date" class="form-control" id="inputEmail4">
                                </div>
                                <div class="row col-md-3 mt-4 ml-5 d-flex">
                                    <label for="inputPassword4" class="form-label">電話番号(任意)</label>
                                    <div class="d-flex justify-content-center">
                                        <input type="tel" class="form-control" id="inputGroupFile02">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5 d-flex justify-content-center">
                                    <button type="submit" class="btn-lg btn-custom-pink"><span class="sp-5">依頼する</span></button>
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
