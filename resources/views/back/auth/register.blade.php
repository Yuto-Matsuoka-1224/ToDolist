<!-- 
    アカウント作成機能

    ①ユーザー，パスワードが間違っている場合，エラーを表示
    ②パスワード誤入力防止のため，パスワード確認を行う

-->

<!doctype html>
<html lang="ja">

<!-- ブラウザタブのタイトル設定 -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新規登録 | Todoリスト</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">新規登録</div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'register']) }}

                            <!-- ユーザー名入力 -->
                            <div class="form-group">
                                {{ Form::label('name', 'ユーザー名') }}
                                {{ Form::text('name', null, [
                                    'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')
                                ]) }}
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- パスワード入力 -->
                            <div class="form-group">
                                {{ Form::label('password', 'パスワード') }}
                                {{ Form::password('password', [
                                    'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')
                                ]) }}
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- パスワード確認入力 -->
                            <div>
                                {{ Form::label('password_confirmation', 'パスワード確認') }}
                                {{ Form::password('password_confirmation', [
                                    'class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : '')
                                ]) }}
                            </div>

                            <!-- 正しく認証 → 新規登録したのち，個人アカウント画面へ遷移 -->
                            <div style="padding-top: 17px">
                                <button type="submit" class="btn btn-primary">新規登録</button>
                            </div>

                            <hr>
                            <div class="form-group">
                                {{ Form::label('SNS', 'SNSで新規登録') }}
                            </div>

                            <!-- Twitterで新規登録 -->
                            <a href="/auth/twitter" class="sns-btn twitter" style="margin-top:-10px">
                                <span class = "fa fa-twitter"></span>
                                Twitterで登録
                            </a>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- フッター部分 -->
<footer class="footer bg-dark  fixed-bottom">
   <div class="container text-center">
      <span class="text-light">©Yuto Matsuoka</span>
   </div>
</footer>
</body>
</html>