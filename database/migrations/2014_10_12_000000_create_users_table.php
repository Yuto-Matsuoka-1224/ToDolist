<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /* マイグレーションの実行

       id ... 通し番号（ 連番 )
       title ... ユーザー名（ 文字列 ）
       password ... パスワード（ 文字列 ）
       role ... 管理者権限の識別番号（ 0：通常ユーザー，1：管理者 | デフォルト値：0 ）
       timestamps ... 作成日・更新日（ 日付／時刻 )

    */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->tinyInteger('role')->default(0);
            $table->timestamps();
        });
    }

    /* 既にテーブルが存在していた場合，テーブルを削除 */

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
