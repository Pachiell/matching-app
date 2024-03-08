@extends('layouts.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header custom-card-header d-flex justify-content-center bg-clear">ユーザー情報編集</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form class="g-3" action="{{ route('edit_profile', $results['id']) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="text-center">
                                <div class="form-group">
                                    <span class="input-group-text col-2 ml-2">プロフィール</span>
                                    <input type="file" class="form-control-file text-center" id="icon"
                                        name="icon" onchange="previewImage(event)">
                                </div>
                                <div class="text-center ml-5 mb-3">
                                    <img id="preview" class="preview-image" src="#" alt="Preview Image"
                                        style="display: none;">
                                </div>
                                <div class="input-group col-8 mb-3">
                                    <span class="input-group-text" id="basic-addon1">ユーザー名</span>
                                    <input type="text" class="form-control" name="name" aria-describedby="basic-addon1"
                                        value="{{ $results['name'] }}">
                                </div>
                                <hr>
                                <div class="input-group col-8 mb-3">
                                    <span class="input-group-text" id="basic-addon2">メールアドレス</span>
                                    <input type="text" class="form-control" name="email" aria-describedby="basic-addon2"
                                        value="{{ $results['email'] }}">
                                </div>
                                <hr>
                                <div class="input-group col-8 mb-3">
                                    <span class="input-group-text" id="basic-addon3">パスワード</span>
                                    <input type="password" class="form-control" name="password" aria-describedby="basic-addon3">
                                </div>
                                <hr>
                            </div>

                            <h6>ひとこと</h6>
                            <p>
                                <textarea type="text" class="form-control col-9" name="oneword" value="">{{ $results['oneword'] }}</textarea>
                            </p>
                            <hr>
                            <h4>コメント</h4>
                            <p>
                                <textarea type="text" class="form-control" name="comment" value="">{{ $results['comment'] }}</textarea>
                            </p>
                            <div class="col-md-12 mt-5 d-flex justify-content-center">
                                <button type="submit" class="btn-lg bg-green"><span class="sp-5">変更する</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
