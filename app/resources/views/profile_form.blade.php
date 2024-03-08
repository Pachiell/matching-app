@extends('layouts.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div><img src="{{ asset($results['icon']) }}" class="w-25 profile-picture"></div>
                            <h2 class="mt-3">{{ $results['name'] }}</h2>
                            <p class="text-muted">{{ $results['oneword'] }}</p>
                        </div>
                        <hr>
                        <h4>登録メールアドレス</h4>
                        <p>{{ $results['email'] }}</p>
                        <hr>
                        <h4>コメント</h4>
                        <p>{{ $results['comment'] }}</p>
                        <hr>
                    </div>
                    <div class="col-md-12 mt-5 d-flex justify-content-center">
                        <a href="{{ route('edit_profile_form') }}">
                            <button type="submit" class="btn-lg bg-green"><span class="sp-5">変更する</span></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
