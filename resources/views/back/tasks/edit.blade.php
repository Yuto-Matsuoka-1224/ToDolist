<!-- 
    タスク編集のブラウザ表示
　　　
    ① 編集者，登録日時，編集日時を表示
 -->

<?php
$title = 'タスク編集／実施時間記録';
?>

<!-- デモ画面のレイアウト作成 → 「base.blade.php」へ -->
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">タスク編集／実施時間記録</div>
<div class="card-body">

     <!-- 編集画面遷移時に，入力情報を代入した状態に → フォームは「_form.blade.php」へ -->
    {{ Form::token() }}
    {!! Form::model($task, [
        'route' => ['back.tasks.update', $task],
        'method' => 'put'
    ]) !!}
    @include('back.tasks._form')
    {!! Form::close() !!}
</div>

<!-- 編集者，登録日時，更新日時の表示 -->
<table class="table">
    <tr>
        <th>編集者</th>
        <td>{{ $task->user->name }}</td>
    </tr>
    <tr>
        <th>登録日時</th>
        <td>{{ $task->created_at }}</td>
    </tr>
    <tr>
        <th>編集日時</th>
        <td>{{ $task->updated_at }}</td>
    </tr>
</table>
@endsection