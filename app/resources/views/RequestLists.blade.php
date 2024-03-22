@extends('layouts.layout')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <div class="title-menu">
            <div class="title-left">
                <label for="inputEmail4" class="form-label">
                    <h2>依頼一覧</h2>
                </label>
            </div>

            <div class="title-right">
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
                    <th scope="col">依頼内容</th>
                    <th scope="col">確認</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                @foreach($result->request as $request)
                <tr>
                    <th>{{ $result['title'] }}</th>
                    <th>{{ $result['amount'] }}</th>
                    <th>{{ $result['comment'] }}</th>
                    <th>{{ $request['comment'] }}</th>
                    <th><button type="button" class="btn btn-success" onclick="location.href='{{ route('judge_request_form',['request' => $request['id'],'service' => $result['id']]) }}'">確認</button></th>
                    {{-- <th><button type="button" class="btn btn-danger" onclick="location.href='{{ route('delete_service_form',['request' => $request['id']]) }}'">削除</button></th> --}}
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection