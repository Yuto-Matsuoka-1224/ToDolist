<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskdemosTable extends Migration
{
    /* マイグレーションの実行

       id ... 通し番号（ 連番 )
       complete ... タスク完了・未完の表示（ 文字列 | 0→未完，1→完了 | デフォルト値：0 ）
       title ... タイトル（ 文字列 ）
       predicttime_hours, predicttime_minutes ... タスク実施予想時間（ 整数値 )
       realtime_hours, realtime_minutes ... タスク実施時間（ 整数値 | デフォルト値：0時間0分 )
       timestamps ... 作成日・更新日（ 日付／時刻 )

    */
    
    public function up()
    {
        Schema::create('taskdemos', function (Blueprint $table) {
            $table->id();
            $table->tinyint('complete')->default(0);
            $table->string('title');
            $table->integer('predicttime_hours');
            $table->integer('predicttime_minutes');
            $table->integer('realtime_hours')->default(0);
            $table->integer('realtime_minutes')->default(0);
            $table->timestamps();
        });
    }

    /* 既にテーブルが存在していた場合，テーブルを削除 */

    public function down()
    {
        Schema::dropIfExists('taskdemos');
    }
}
