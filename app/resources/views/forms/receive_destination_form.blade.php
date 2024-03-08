@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">パスワード再設定</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('send.mail') }}" method="POST">
              @csrf
              <div class="form-group">
                <div class="text-center ">
                    <h6>※登録済みメールアドレスへパスワード再設定用URLをお送りします※<h6>
                  </div>
                <label for="email" class="mt-4">登録メールアドレス</label>
                <div class="mt-3 text-danger">{{ isset($error) ? $error : '' }}</div>
                <input type="text" class="form-control mt-3" id="email" name="email" value="{{ old('email') }}" />
              <div class="text-center">
                <button type="submit" class="btn btn-primary w-25 mt-4">送信</button>
              </div>
                <a href="{{ route('login') }}">戻る</a>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
