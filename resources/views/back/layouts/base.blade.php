<!-- 
    デモ画面のレイアウト作成

    ① 管理者権限，ログアウト機能
 -->

<!doctype html>
<html lang="ja">

<!-- ブラウザタブのタイトル表示 -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . ' | ' : '' }}Todoリスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<div id="app">

    <!-- ヘッダー部分 -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('back.dashboard') }}">
                Todoリスト：<span style="color: blue;">ようこそ {{ $user->name }} さん！</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <!-- 管理者権限 → 「admin.blade.php」へ -->
                    @can('admin')
                    <li class="nav-item{{ Request::is('admin/tasks', 'admin/tasks/*') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('back.tasks.index') }}">ユーザー</a>
                    </li>
                    @endcan

                    <!-- ダッシュボード機能 → タスク一覧へ戻る -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('back.dashboard') }}">ダッシュボード</a></li>

                    <!-- ログアウト機能 -->
                    <li class="nav-item">
                        <a href="#" class="nav-link" onClick="(function(){
                            document.getElementById('logout-form').submit();
                            return false;
                        })();">ログアウト</a>
                        {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
                        {{ Form::close() }}
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