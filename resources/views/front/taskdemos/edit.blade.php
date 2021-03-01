<!-- 
    タスク編集のブラウザ表示
　　　
    ① 編集者，登録日時，編集日時を表示
 -->

<?php
$title = 'タスク編集／実施時間記録';
?>

<!-- デモ画面のレイアウト作成 → 「base.blade.php」へ -->
@extends('front.layouts.base')

@section('content')
<div class="card-header">タスク編集／実施時間記録</div>
<div class="card-body">

    <!-- 編集画面遷移時に，入力情報を代入した状態に → フォームは「_form.blade.php」へ -->
    <!-- csrf対策 & XSS対策 -->
    {{ Form::token() }}
    {!! Form::model($taskdemo, [
        'route' => ['front.taskdemos.update', $taskdemo],
        'method' => 'put'
    ]) !!}
    @include('front.taskdemos._form')
    {!! Form::close() !!}
</div>

<!-- 編集者，登録日時，更新日時の表示 -->
<table class="table">
    <tr> 
        <th>編集者</th>
        <td>ゲスト</td>
    </tr>
    <tr>
        <th>登録日時</th>
        <td>{{ $taskdemo->created_at }}</td>
    </tr>
    <tr>
        <th>編集日時</th>
        <td>{{ $taskdemo->updated_at }}</td>
    </tr>
</table>
@endsection