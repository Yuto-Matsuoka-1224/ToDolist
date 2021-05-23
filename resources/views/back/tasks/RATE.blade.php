<!-- 
    RATE機能の説明
 -->

 <?php
$title = 'RATEとは？';
?>

@extends('back.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>

<div class="card-body">

1つのタスクをこなすのに，<span style="font-weight:bold">思っていたよりもどの程度時間がかかったかを示す比率。</span><br><br>
人々は，思ったよりも<span style="color:red;">3.0倍</span>程度の時間をかけてタスクをこなすと言われています。<br>
よって，人々は時間の見積もりをするのが苦手な傾向にあり，締切が多い場合は正しい時間管理が求められます。<br>
（作成者も，タスクを見積もることが苦手で，1日のタスクを全て終えた時には，深夜2時とかになっていることもしばしばありました、、）<br><br>

そこで，特にやらなければいけないことが多い時に，<span style="color:blue;">時間管理を助けるサービスが「RATE」という指標</span>です。<br>
これは，あらかじめかかる時間を正確に予測することで，時間管理のサポートを行うものとなっています。<br>

以下，RATEの基準値となっています。（アンケート対象者：15人）<br><br>

<table class="table table-striped table-bordered table-hover table-sm">
    <thead>
        <tr>
            <th scope="col" style="width: 10em; text-align: center; vertical-align: middle;">RATE</th>  <!-- テーブル名を中央に表示 -->
            <th scope="col" style="width: 30em; text-align: center; vertical-align: middle;">基準</th>  <!-- テーブル名を中央に表示 -->
        </tr>
    </thead>
    <tbody>
    <tr>
        <td style="text-align: center; color:red;">1.80〜</td>
        <td style="text-align: center;">もう少しゆとりを持って，予定時間を組んでみましょう。</td>  <!-- カラム名を中央に表示 -->
    </tr>
    <tr>
        <td style="text-align: center;">0.70〜1.80</td>
        <td style="text-align: center;">丁度良い予定時間の組み方です！この範囲に収まるように継続しましょう。</td>  <!-- カラム名を中央に表示 -->
    </tr>
    <tr>
        <td style="text-align: center; color:blue;">〜0.70</td>
        <td style="text-align: center;">予定時間を短く見積もってもいいかもしれませんね。</td>  <!-- カラム名を中央に表示 -->
    </tr>
    </tbody>
</table>
</div>
@endsection

