<!-- 
    完了タスク一覧のブラウザ表示
　　　
    ① タスクが無い場合は，「表示するタスクがありません」と表示
    ② テーブル名／カラム名の文字を中央に表示
    ③ RATE（実施時間／実施予想時間の比）の計算（強調のため赤字表記）

 -->

<?php
$title = 'タスク完了一覧';
?>

<!-- デモ画面のレイアウトの作成 → 「base.blade.php」へ -->
@extends('front.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>


<div class="card-body">

    <!-- 未完タスクの一覧画面へ遷移 -->
    <div style="position:absolute; top:12px; right:25px;">  
        <a href='/'>タスク一覧に戻る</a>
    </div>

    <!-- タスク一覧表示の処理 -->
    @if ($taskdemos->count() <= 0)
        <p>表示するタスクはありません。</p>  <!-- タスクが無い場合，「表示するタスクはありません」と表示 -->
    @else
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th scope="col" style="text-align: center; vertical-align: middle;">タスク</th>  <!-- テーブル名を中央に表示 -->
                <th scope="col" style="width: 10em; text-align: center; vertical-align: middle;">実施時間</th>  <!-- テーブル名を中央に表示 -->
                <th scope="col" style="width: 10em; text-align: center; vertical-align: middle;">実施予定時間</th>  <!-- テーブル名を中央に表示 -->
                <th scope="col" style="width: 12.5em; text-align: center; vertical-align: middle;">RATE</th>  <!-- テーブル名を中央に表示 -->
            </tr>
        </thead>
        <tbody>
        @foreach($taskdemos as $taskdemo)
        <tr>
             <td>{{ $taskdemo->title }}</td>  <!-- カラム名を中央に表示 -->
             <td style="text-align: center;">{{ $taskdemo->realtime_hours }}時間{{ $taskdemo->realtime_minutes }}分</td>  <!-- カラム名を中央に表示 -->
             <td style="text-align: center;">{{ $taskdemo->predicttime_hours }}時間{{ $taskdemo->predicttime_minutes }}分</td>  <!-- カラム名を中央に表示 -->
             <?php 
               $real_time = $taskdemo->realtime_hours * 60 + $taskdemo->realtime_minutes;
               $predict_time = $taskdemo->predicttime_hours * 60 + $taskdemo->predicttime_minutes;
               $RATES = $real_time/$predict_time;
               $RATE = number_format($RATES, 2);
             ?>
             @if ($RATE >= 1.4)
               <td style="color:#ff0000; text-align: center;">{{ $RATE }}</td>
             @elseif ($RATE >= 0.85)
               <td style="color:#000000; text-align: center;">{{ $RATE }}</td>
             @else
               <td style="color:#0000ff; text-align: center;">{{ $RATE }}</td>
             @endif
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection