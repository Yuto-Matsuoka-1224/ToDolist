<!-- 
    タスク一覧のブラウザ表示（アカウント保持者）
　　　
    ① タスクが無い場合は，「表示するタスクがありません」と表示
    ② テーブル名／カラム名の文字を中央に表示
    ③ 削除を行う際は，確認メッセージ「本当に削除しますか？」を表示

 -->

<?php
$title = 'タスク一覧';
?>
<!-- フレームワークの作成 → 「base.blade.php」へ -->
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">

    <!-- タスクの登録 →「create.blade.php」へ -->
    {{ link_to_route('back.tasks.create', 'タスク登録', null, ['class' => 'btn btn-primary mb-3']) }}

    <!-- 完了タスクの一覧画面へ遷移 -->
    <div style="position:absolute; top:12px; right:25px;">
        <a href='/admin/tasks/complete'>完了したタスクはこちら</a>
    </div>

    <!-- タスク一覧表示の処理 -->
    @if ($tasks->count() <= 0)
        <p>表示するタスクはありません。</p>  <!-- タスクが無い場合，「表示するタスクはありません」と表示 -->
    @else
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">タスク</th>  <!-- テーブル名を中央に表示 -->
                <th scope="col" style="width: 10em; text-align: center;">実施時間</th>  <!-- テーブル名を中央に表示 -->
                <th scope="col" style="width: 10em; text-align: center;">実施予定時間</th>  <!-- テーブル名を中央に表示 -->
                <th scope="col" style="width: 12.5em;"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td style="vertical-align: middle;">{{ $task->title }}</td>  <!-- カラム名を中央に表示 -->
                <td style="text-align: center; vertical-align: middle;">{{ $task->realtime_hours }}時間{{ $task->realtime_minutes }}分</td>  <!-- カラム名を中央に表示 -->
                <td style="text-align: center; vertical-align: middle;">{{ $task->predicttime_hours }}時間{{ $task->predicttime_minutes }}分</td>  <!-- カラム名を中央に表示 -->
                <td class="d-flex justify-content-center">

                <!-- タスクの編集／記録 → 「edit.blade.php」へ -->
                {{ link_to_route('back.tasks.edit', '編集・記録', $task, [
                     'class' => 'btn btn-secondary btn-sm m-1'
                ]) }}

                <!-- タスクの削除 -->
                <!-- 削除時は，確認メッセージ「本当に削除しますか？」を表示 -->
                {{ Form::model($task, [
                     'route' => ['back.tasks.destroy', $task],
                     'method' => 'delete'
                ]) }}
                 {{ Form::submit('削除', [
                     'onclick' => "return confirm('本当に削除しますか?')",
                     'class' => 'btn btn-danger btn-sm m-1'
                 ]) }}
                 {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection