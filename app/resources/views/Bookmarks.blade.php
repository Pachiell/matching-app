@extends('layouts.layout')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <div class="title-menu">
            <div class="title-left">
                <label for="inputEmail4" class="form-label">
                    <h2>ブックマーク</h2>
                </label>
            </div>
        </div>
    </head>

    <body>
        <table class="table table-bordered">
            <thead class="table-bordered bg-clear">
                <tr>
                    <th scope="col">詳細</th>
                    <th scope="col">投稿No</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">金額</th>
                    <th scope="col">内容</th>
                    <th scope="col">依頼申請</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <th scope="col">🔴</td>
                        <th scope="col" class="id">{{ $result['id'] }}</th>
                        <th scope="col" class="title">{{ $result['title'] }}</th>
                        <th scope="col" class="amount">{{ $result['amount'] }}</th>
                        <th scope="col" class="comment">{{ $result['comment'] }}</th>
                        <input type="hidden" class="image" value="{{ $result['image'] }}" />                   
                        <td>
                            <a href="{{ route('request_service_form', $result['service_id']) }}">
                                <button type="button" class="btn bg-pink">依頼する</button></a>
                        </td>
                        <td>
                            <a href="{{ route('delete_bookmark_form', $result['id']) }}">
                                <button type="button" class="btn bg-red">削除する</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection
