<!-- 
    タスク一覧のブラウザ表示 (管理者用)
　　　
    ① タスクが無い場合は，「表示するタスクがありません」と表示
    ② テーブル名／カラム名の文字を中央に表示
    ③ 編集者の表示（外部キーと主キーの紐付け）

 -->

<?php
$title = 'タスク一覧';
?>

<!-- フレームワークの作成 → 「base.blade.php」へ -->
@extends('back.layouts.base')

@section('content')

<!-- タスク一覧表示の処理 -->
<div class="card-header">タスク一覧</div>
<div class="card-body">
    @if($tasks->count() <= 0)
        <p>表示するタスクはありません。</p>  <!-- タスクが無い場合，「表示するタスクはありません」と表示 -->
    @else
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col" style="width: 3em; text-align: center;">ID</th>  <!-- テーブル名を中央に表示 -->
                    <th scope="col" style="text-align: center;">タスク</th>  <!-- テーブル名を中央に表示 -->
                    <th scope="col" style="width: 10em; text-align: center;">実施時間</th>  <!-- テーブル名を中央に表示 -->
                    <th scope="col" style="width: 10em; text-align: center;">実施予定時間</th>  <!-- テーブル名を中央に表示 -->
                    <th scope="col" style="width: 10em; text-align: center;">編集者</th>  <!-- テーブル名を中央に表示 -->
                </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td style="text-align: center; vertical-align: middle;">{{ $task->id }}</td>  <!-- カラム名を中央に表示 -->
                    <td style="vertical-align: middle;">{{ $task->title }}</td>  
                    <td style="text-align: center; vertical-align: middle;">{{ $task->realtime_hours }}時間{{ $task->realtime_minutes }}分</td>  <!-- カラム名を中央に表示 -->
                    <td style="text-align: center; vertical-align: middle;">{{ $task->predicttime_hours }}時間{{ $task->predicttime_minutes }}分</td>  <!-- カラム名を中央に表示 -->
                    <td style="text-align: center; vertical-align: middle;">{{ $task->user->name }}</td>  <!-- カラム名を中央に表示 & 編集者の表示 -->
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $tasks->links() }}
        </div>
    @endif
</div>
@endsection