@extends('layouts.layout')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <main class="py-4">
            <div class="row justify-content-center">
                <div class="col-sm-5 mb-sm-0">
                    <div class="card">
                        <div class="card-header text-center">キーワード検索</div>
                        <div class="card-body">
                            <form action="{{ route('search.keyword') }}" method="post">
                                @csrf
                                <div class="input-group" id="keywordpicker">
                                    <input type="text" class="form-control"  name="keyword" placeholder="キーワード入力">
                                    <button type="submit" class='btn btn-success btn-space ml-3'>検索</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mb-sm-0 ">
                    <div class="card">
                        <div class="card-header text-center">金額検索</div>
                        <div class="card-body">
                            <form action="{{ route('search.amount') }}" method="post">
                                @csrf
                               <div class="input-group" id="amountpicker">
                                <select class="form-control" id="tag-id" name="amount-from">
                                    @foreach (Config::get('tag.tag_name') as $key => $val)
                                        <option  value="{{ $val }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-2">円</div>
                                 <div class="align-bottom mt-2">&emsp;〜&emsp;</div>
                                 <select class="form-control" id="tag-id" name="amount-to">
                                    @foreach (Config::get('tag.tag_name') as $key => $val)
                                        <option value="{{ $val }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-2">円</div>
                                 <button type="submit" class='btn btn-success btn-space ml-3'>検索</button>
                               </div>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <div class="title-menu">
            <div class="title-left">
                <label for="inputEmail4" class="form-label">
                    <h2>投稿一覧</h2>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <th>
                            <div scope="col" class="btn-link service_btn" id="{{ $result['id'] }}"> <i
                                    class="bi bi-search search-btn"></i></div>
                            <section id="modal-{{ $result['id'] }}" class="modalArea">
                                <div id="{{ $result['id'] }}" class="modalBg"></div>
                                <div class="modalWrapper">
                                    <div class="modalContents">
                                        <div class="container">
                                            <div class="btn-link danger-text"><i
                                                    class="bi bi-exclamation-triangle-fill"></i>違反報告<i
                                                    class="bi bi-exclamation-triangle-fill"></i></div>
                                            <nav class="card mt-3">
                                                <div
                                                    class="card-header custom-card-header d-flex justify-content-center bg-orange">
                                                    投稿内容</div>
                                                <div class="card-body">
                                                    <div class="col-md-7 mt-4 ml-5">
                                                        <label for="post-title" class="form-label">タイトル</label>
                                                        <input type="text" class="form-control" name="title"
                                                            id="title" value="{{ $result['title'] }}" disabled>
                                                    </div>
                                                    <div class="col-md-3 mt-4 ml-5">
                                                        @csrf
                                                        <label for="amount" class="form-label">金額</label>
                                                        <div class="d-flex justify-content-center">
                                                            <input type="text" class="form-control" name="amount"
                                                                id="amount" value="{{ $result['amount'] }}" disabled>
                                                            <div class="fs-20">円</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mt-5 ml-5">
                                                        <label for="comment" class="form-label">内容</label>
                                                        <textarea class="form-control" name="comment" id="comment" aria-label="With textarea" disabled>{{ $result['comment'] }}</textarea>
                                                    </div>
                                                    @if (isset($result['image']))
                                                        <div>
                                                            <label for="post-title"
                                                                class="form-label col-md-6 mt-4 ml-5">添付ファイル</label>
                                                            <div class="col-md-6 ml-5">
                                                                <img src="{{ asset($result['image']) }}" class="w-100">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div id="{{ $result['id'] }}" class="closeModal">
                                                        ×
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </th>
                        <th scope="col" class="id">{{ $result['id'] }}</th>
                        <th scope="col" class="title">{{ $result['title'] }}</th>
                        <th scope="col" class="amount">{{ $result['amount'] }}</th>
                        <th scope="col" class="comment">{{ $result['comment'] }}</th>
                        <input type="hidden" class="image" value="{{ $result['image'] }}" />
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(function() {
        $('.service_btn').click(function() {
            const button_id = $(this).attr('id')
            $('#modal-' + button_id).fadeIn();
        });

        $('.closeModal , .modalBg').click(function() {
            const button_id = $(this).attr('id')
            $('#modal-' + button_id).fadeOut();
        });
    });
</script>
