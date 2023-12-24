<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('players_id')->constrained('players');
            $table->foreignId('scouts_team_id')->constrained('scouts_team');
            $table->timestamps();
            $table->datetime('post_date');
            $table->string('post_url_1', 255);
            $table->string('check_point_1', 100);
            $table->string('post_url_2', 255)->nullable();
            $table->string('check_point_2', 100)->nullable();
            $table->string('post_url_3', 255)->nullable();
            $table->string('check_point_3', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_posts');
    }
};
