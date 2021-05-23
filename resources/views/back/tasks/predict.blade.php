<!--
    タスク予測
 -->

 <?php
$title = 'タスク登録（予測）';
?>

<!-- デモ画面のレイアウト作成 → 「base.blade.php」へ -->
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">

     <!-- 編集画面遷移時に，入力情報を代入した状態に → フォームは「_form.blade.php」へ -->
    {{ Form::token() }}
    {!! Form::model($task, [
        'route' => ['back.estiminate', $task],
        'method' => 'put'
    ]) !!}
    @include('back.tasks._form')
    {!! Form::close() !!}
</div>
@endsection
