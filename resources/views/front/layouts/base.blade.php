<!-- 
    デモ画面のレイアウト作成

    ① ログイン機能，新規登録機能の作成
 -->

<!doctype html>
<html lang="ja">

<!-- ブラウザタブのタイトル表示 -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . ' | ' : '' }}Todoリスト デモ画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body>
<div id="app">

    <!-- ヘッダー部分 -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('front.home') }}">
                Todoリスト デモ画面
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <!-- ログイン機能 → auth「login.blade.php」へ -->
                    <li class="nav-item{{ Request::is('/') ? ' active' : '' }}">
                        <a class="nav-link" href="/login">ログイン</a>
                    </li>

                    <!-- 新規登録機能 → auth「register.blade.php」へ -->
                    <li class="nav-item{{ Request::is('/') ? ' active' : '' }}">
                        <a class="nav-link" href="/register">新規登録</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- コンテンツ部分 -->
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- フッター部分 -->
<footer class="footer bg-dark  fixed-bottom">
  <div class="container text-center">
    <span class="text-light">©Yuto Matsuoka</span>
  </div>
</footer>

<!-- 外部スクリプトを用いたデザインの設定 -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>