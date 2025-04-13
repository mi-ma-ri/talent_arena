<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id('id')->comment('会員ID(選手)'); // プレイヤーID
            $table->tinyInteger('players_status')->comment('0:仮登録 1:登録済み 2:退会'); // ユーザーステータス
            $table->string('ms', 255)->comment('メールアドレス'); // メールアドレス
            $table->string('ms_hash', 255)->comment('メールアドレスハッシュ値'); // メールアドレスハッシュ値

            // 本登録で必要だけど、仮登録時は未入力なので nullable にする
            $table->string('first_name', 50)->nullable()->comment('姓'); // 姓
            $table->string('second_name', 50)->nullable()->comment('名');; // 名
            $table->string('affiliated_team', 100)->nullable()->comment('現所属チーム'); // 現所属チーム
            $table->string('position', 50)->nullable()->comment('ポジション'); // ポジション
            $table->date('birth_date')->nullable()->comment('生年月日'); // 生年月日
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
}
