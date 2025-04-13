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
        Schema::create('player_videos', function (Blueprint $table) {
            $table->id('id')->comment('動画ID'); // 動画ID
            $table->unsignedBigInteger('player_id')->comment('playersテーブルのキー'); // プレイヤーID

            // 本登録で必要だけど、仮登録時は未入力なので nullable にする
            $table->string('sns_url_1', 255)->comment('動画URL1'); // 動画URL1
            $table->string('sns_url_2', 255)->nullable()->comment('動画URL2'); // 動画URL2
            $table->string('sns_url_3', 255)->nullable()->comment('動画URL3'); // 動画URL3
            $table->string('description', 255)->comment('動画説明'); // 動画説明
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes()->comment('削除日'); // deleted_at

            // 外部キー制約
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_videos');
    }
};
