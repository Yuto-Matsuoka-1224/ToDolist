<!-- タスク登録のブラウザ表示 -->

<?php
$title = 'タスク登録';
?>

<!-- デモ画面のレイアウトの作成 → 「base.blade.php」へ -->
@extends('back.layouts.base')
 
@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        
        <!-- 登録フォームに従って，データの保存を行う → 「_form.blade.php」へ -->
        {{ Form::open(['route' => 'back.tasks.store']) }}
        @include('back.tasks._form')
        {{ Form::close() }}
    </div>
@endsection