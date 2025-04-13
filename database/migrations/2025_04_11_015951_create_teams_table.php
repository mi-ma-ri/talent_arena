<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id('id')->comment('チーム'); // チームID
            $table->tinyInteger('teams_status')->comment('0:仮登録 1:登録済 2:退会'); // チームステータス
            $table->string('ms', 255)->comment('メールアドレス'); // メールアドレス
            $table->string('ms_hash', 255)->comment('メールアドレスハッシュ値'); // メールアドレスハッシュ値

            // 本登録で必要だけど、仮登録時は未入力なので nullable にする
            $table->string('teams_name', 50)->nullable()->comment('チーム名'); // チーム名
            $table->string('teams_policy', 255)->nullable()->comment('チーム方針・理念'); // チーム方針・理念
            $table->string('location', 255)->nullable()->comment('活動地域'); // 活動地域
            $table->string('schedule', 50)->nullable()->comment('スケジュール'); // スケジュール
            $table->string('website', 255)->nullable()->comment('公式サイトURL'); // 公式サイトURL
            $table->string('ob_affiliation', 255)->nullable()->comment('OB進学先'); // OB進学先
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes()->comment('削除日'); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
