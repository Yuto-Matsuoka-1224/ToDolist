<!-- 
    入力フォーム

    ① 可視性の向上 → ラベル名を太字で表記
    ② タスク：テキスト形式／実施予定時間，実施時間：プルダウン形式／完了ボタン：チェックボックス形式で表現
    ③ 入力フォームで未入力の場合，エラーメッセージ「このフィールドに値を入力してください」を表示
    ④ 編集画面でのみ，実施時間，タスク完了ボタンの表示（登録画面では表示しない）
    
 -->

<!-- タスクの入力フォーム（テキスト形式） -->
<div class="form-group" style="margin-top: -25px;">
　  <h6 style="font-weight: 800;">{{ Form::label('title', 'タスク', ['class' => 'col-sm-12 col-form-label']) }}</h6> <!-- ラベル名を太字表記 -->
    <div class="col-sm-12">
        
        <!-- 未入力 → エラーメッセージ「このフィールドに値を入力してください」を表示 -->
        {{ Form::text('title', null, [
            'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
            'required'
        ]) }}
     </div>
</div>

<!-- 実施予定時間の入力フォーム（プルダウン形式） -->
<div class="form-group">
    <h6 style="font-weight: 800;">{{ Form::label('predicttime_hours', '実施予定時間', ['class' => 'col-sm-12 col-form-label']) }}</h6> <!-- ラベル名を太字表記 -->
    <div class="col-sm-12">
        {{ Form::select('predicttime_hours',range(0,23)) }}時間
        {{ Form::select('predicttime_minutes',range(0,59)) }}分
    </div>
</div>

<!-- 実施時間／タスク完了ボタンのフォームについては，編集画面でのみ表示 -->
@if($title == 'タスク編集／実施時間記録')

<div class="form-group" style="margin-top: 40px">
    <hr>
    <!-- 実施時間の入力フォーム（プルダウン形式） -->
    <h6 style="font-weight: 800;">{{ Form::label('realtime_hours', '実施時間記録', ['class' => 'col-sm-12 col-form-label']) }}</h6>  <!-- ラベル名を太字表記 -->
    <div class="col-sm-12">
        {{ Form::select('realtime_hours',range(0,23)) }}時間
        {{ Form::select('realtime_minutes',range(0,59)) }}分
    </div>
    <!-- タスク完了時のチェック（チェックボックス形式） -->
    <div class="col-sm-12" style="padding: 15px;">
        {{ Form::checkbox('complete', True) }}<span style="font-weight: 500;"> タスクを完了する</span>
    </div>
</div>
@endif

<!-- 編集後カラムの保存／一覧リストへ戻る -->
<div class="form-group">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        {{ link_to_route('back.dashboard', '一覧へ戻る', null, ['class' => 'btn btn-secondary']) }}
    </div>
</div>