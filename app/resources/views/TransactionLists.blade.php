@extends('layouts.layout')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <div class="title-menu">
            <div class="title-left">
                <label for="inputEmail4" class="form-label">
                    <h2>取引一覧</h2>
                </label>
                <a href="{{ url('/') }}">
                    <button type="button" class="btn btn-link">
                        <h4>＞投稿一覧へ</h4>
                    </button>
                </a>
            </div>

            <div class="title-right">
                <div>
                    <a href="{{ route('create_service_form') }}">
                        <button type="button" class="btn bg-orange">新規投稿</button>
                    </a>
                </div>
                <div>
                    <a href="{{ route('RequestList') }}">
                        <button type="button" class="btn btn-primary">依頼確認</button>
                    </a>
                </div>
            </div>
        </div>
    </head>

    <body>
        <table class="table table-bordered">
            <thead class="table-bordered bg-clear">
                <tr>
                    <th scope="col">詳細</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">金額</th>
                    <th scope="col">内容</th>
                    <th scope="col">ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $result_service)
                    <tr>
                        <th>
                            <div class="btn-link service_btn" id="{{ $result_service['id'] }}">#詳細</div>
                            {{-- モーダル --}}
                            <section id="modal-{{ $result_service['id'] }}" class="modalArea">
                                <div id="{{ $result_service['id'] }}" class="modalBg"></div>
                                <div class="modalWrapper">
                                    <div class="modalContents">
                                        <div class="container">
                                            <nav class="card mt-5">
                                                <div
                                                    class="card-header custom-card-header d-flex justify-content-center bg-orange">
                                                    投稿内容</div>
                                                <div class="card-body">
                                                    <div class="col-md-7 mt-4 ml-5">
                                                        <label for="post-title" class="form-label">タイトル</label>
                                                        <input type="text" class="form-control" name="title"
                                                            id="title" value="{{ $result_service['title'] }}" disabled>
                                                    </div>
                                                    <div class="col-md-3 mt-4 ml-5">
                                                        @csrf
                                                        <label for="amount" class="form-label">金額</label>
                                                        <div class="d-flex justify-content-center">
                                                            <input type="text" class="form-control" name="amount"
                                                                id="amount" value="{{ $result_service['amount'] }}"
                                                                disabled>
                                                            <div class="fs-20">円</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mt-5 ml-5">
                                                        <label for="comment" class="form-label">内容</label>
                                                        <textarea class="form-control" name="comment" id="comment" aria-label="With textarea" disabled>{{ $result_service['comment'] }}</textarea>
                                                    </div>
                                                    @if (isset($result_service['image']))
                                                        <div>
                                                            <label for="post-title"
                                                                class="form-label col-md-6 mt-4 ml-5">添付ファイル</label>
                                                            <div class="col-md-6 ml-5">
                                                                <img src="{{ asset($result_service['image']) }}"
                                                                    class="w-100">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div id="{{ $result_service['id'] }}" class="closeModal">
                                                        ×
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </th>
                        <th>{{ $result_service['title'] }}</th>
                        <th>{{ $result_service['amount'] }}</th>
                        <th>{{ $result_service['comment'] }}</th>
                        <th>{{ $result_service['status'] }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead class="table-bordered bg-clear">
                <tr>
                    <th scope="col">詳細</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">金額</th>
                    <th scope="col">内容</th>
                    <th scope="col">ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $result)
                    <tr>
                        <th>
                            <div class="btn-link request_btn" id="{{ $result['id'] }}">#詳細</div>
                            {{-- モーダル --}}
                            <section id="modal-{{ $result['id'] }}" class="modalArea">
                                <div id="{{ $result['id'] }}" class="modalBg"></div>
                                <div class="modalWrapper">
                                    <div class="modalContents">
                                        <div class="container">
                                            <nav class="card mt-5">
                                                <div
                                                    class="card-header custom-card-header d-flex justify-content-center bg-orange">
                                                    投稿内容</div>
                                                <div class="card-body">
                                                    <div class="col-md-7 mt-4 ml-5">
                                                        <label for="post-title" class="form-label">タイトル</label>
                                                        <input type="text" class="form-control" name="title"
                                                            id="title" value="{{ $result->service->title }}" disabled>
                                                    </div>
                                                    <div class="col-md-3 mt-4 ml-5">
                                                        <label for="amount" class="form-label">金額</label>
                                                        <div class="d-flex justify-content-center">
                                                            <input type="text" class="form-control" name="amount"
                                                                id="amount" value="{{ $result_service->amount }}"
                                                                disabled>
                                                            <div class="fs-20">円</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mt-5 ml-5">
                                                        <label for="comment" class="form-label">内容</label>
                                                        <textarea class="form-control" name="comment" id="comment" aria-label="With textarea" disabled>{{ $result->service->comment }}</textarea>
                                                    </div>
                                                    @if (isset($result->service->image))
                                                        <div>
                                                            <label for="post-title"
                                                                class="form-label col-md-6 mt-4 ml-5">添付ファイル</label>
                                                            <div class="col-md-6 ml-5">
                                                                <img src="{{ asset($result->service->image) }}"
                                                                    class="w-100">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div id="{{ $result['id'] }}" class="closeModal">
                                                        ×
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                        <div class="container">
                                            <nav class="card mt-5">
                                                <div
                                                    class="card-header custom-card-header d-flex justify-content-center bg-pink">
                                                    依頼申請</div>
                                                <div class="card-body">
                                                    <div class="col-md-10 mt-5 ml-5">
                                                        <label for="inputPassword4" class="form-label">依頼内容</label>
                                                        <textarea class="form-control" name="comment" aria-label="With textarea" disabled>{{ $result['comment'] }}</textarea>
                                                    </div>
                                                    <div class="row col-md-6 mt-4 ml-5 d-flex">
                                                        <label for="inputPassword4" class="form-label">メールアドレス(必須)</label>
                                                        <input type="email" class="form-control" name="e-mail"
                                                            value="{{ $result['e-mail'] }}" disabled>
                                                    </div>
                                                    <div class="row col-md-3 mt-4 ml-5 d-flex">
                                                        <label for="inputEmail4" class="form-label">希望納期(任意)</label>
                                                        <input type="date" class="form-control" name="deadline"
                                                            value="{{ $result['deadline'] }}"disabled>
                                                    </div>
                                                    <div class="row col-md-3 mt-4 ml-5 d-flex">
                                                        <label for="inputPassword4" class="form-label">電話番号(任意)</label>
                                                        <div class="d-flex justify-content-center">
                                                            <input type="tel" class="form-control" name="tel"
                                                                value="{{ $result['tel'] }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </th>
                        <th>{{ $result->service->title }}</th>
                        <th>{{ $result->service->amount }}</th>
                        <th>{{ $result->service->comment }}</th>
                        <th>{{ $result['status'] }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(function() {
        $('.service_btn').click(function() {
            const button_id = $(this).attr('id')
            console.log(button_id);
            $('#modal-' + button_id).fadeIn();
        });

        $('.request_btn').click(function() {
            const button_id = $(this).attr('id')
            console.log(button_id);
            $('#modal-' + button_id).fadeIn();
        });

        $('.closeModal , .modalBg').click(function() {
            const button_id = $(this).attr('id')
            $('#modal-' + button_id).fadeOut();
        });
    });
</script>
