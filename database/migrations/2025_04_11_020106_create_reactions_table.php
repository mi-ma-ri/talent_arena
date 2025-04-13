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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id('id')->comment('reactions_id'); // リアクションID
            $table->unsignedBigInteger('team_id')->comment('teamsテーブルのキー'); // チームID
            $table->unsignedBigInteger('player_id')->comment('playersテーブルのキー'); // プレイヤーID
            $table->unsignedBigInteger('video_id')->comment('player_videosテーブルのキー'); // 動画ID
            $table->tinyInteger('reaction_type')->comment('リアクションタイプ: 1:注目 2:興味あり 3:接触希望'); // リアクションタイプ
            $table->timestamps(); // created_at, updated_at

            // 外部キー制約
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('player_videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
