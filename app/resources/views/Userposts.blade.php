@extends('layouts.layout')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <div class="title-menu">
            <div class="title-left">
                <label for="inputEmail4" class="form-label">
                    <h2>My投稿</h2>
                </label>
            </div>

            <div class="title-right">
                <div>
                  <a href="{{ route('create_service_form')}}">
                    <button type="button" class="btn bg-orange">新規投稿</button>
                  </a>
                </div>
                <div>
                    <a href="{{ route('RequestList')}}">
                    <button type="button" class="btn btn-warning">依頼確認</button>
                    </a>
                </div>
            </div>
        </div>
    </head>

    <body>
        <table class="table table-bordered">
            <thead class="table-bordered bg-clear">
                <tr>
                    <th scope="col">タイトル</th>
                    <th scope="col">金額</th>
                    <th scope="col">内容</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <th>{{ $result['title'] }}</th>
                    <th>{{ $result['amount'] }}</th>
                    <th>{{ $result['comment'] }}</th>
                    <th><button type="button" class="btn btn-success" onclick="location.href='{{ route('edit_service_form',['service' => $result['id']]) }}'">編集</button></th>
                    <th><button type="button" class="btn btn-danger" onclick="location.href='{{ route('delete_service_form',['service' => $result['id']]) }}'">削除</button></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection
