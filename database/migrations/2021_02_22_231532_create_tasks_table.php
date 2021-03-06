<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /* マイグレーションの実行

       id ... 通し番号（ 連番 )
       complete ... タスク完了・未完の表示（ 文字列 | 0→未完，1→完了 | デフォルト値：0 ）
       title ... タイトル（ 文字列 ）
       predicttime_hours, predicttime_minutes ... タスク実施予想時間（ 整数値 )
       realtime_hours, realtime_minutes ... タスク実施時間（ 整数値 | デフォルト値：0時間0分 )
       user_id ... テーブル 'users' の主キー'id' と関連する外部キー
       timestamps ... 作成日・更新日（ 日付／時刻 )

    */

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('complete')->default(0);
            //$table->string('button')->default(0);
            $table->string('title');
            $table->integer('predicttime_hours');
            $table->integer('predicttime_minutes');
            $table->integer('realtime_hours')->default(0);
            $table->integer('realtime_minutes')->default(0);
            $table->float('RATE')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /* テーブルを削除 */

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
