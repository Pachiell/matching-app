@extends('layouts.layout')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <div class="title-menu">
            <div class="title-left">
                <label for="inputEmail4" class="form-label">
                    <h2>投稿一覧</h2>
                </label>
                <button type="button" class="btn btn-link">
                    <h4>＞取引一覧へ</h4>
                </button>
            </div>

            <div class="title-right">
                <div>
                    <a href="{{ route('Myposts') }}">
                        <button type="button" class="btn bg-orange">My投稿</button>
                    </a>
                </div>
                <div>
                    <a href="{{ route('Bookmarks') }}">
                        <button type="button" class="btn btn-warning">ブックマーク</button>
                    </a>
                </div>
            </div>
        </div>
    </head>

    <body>
        <table class="table table-bordered">
            <thead class="table-bordered bg-clear">
                <tr>
                    <th scope="col">チェック</th>
                    <th scope="col">詳細</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">金額</th>
                    <th scope="col">内容</th>
                    <th scope="col">依頼申請</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <th scope="col">⭐️</th>
                        <th scope="col">🔴</td>
                        <th scope="col">{{ $result['title'] }}</th>
                        <th scope="col">{{ $result['amount'] }}</th>
                        <th scope="col">{{ $result['comment'] }}</th>
                        <td>
                            <a href="{{ route('request_service_form') }}">
                                <button type="button" class="btn btn-custom-pink">依頼する</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection
