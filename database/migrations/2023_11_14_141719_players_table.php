<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sports_id')->constrained('sports');
            $table->foreignId('status_id')->constrained('statuses');
            $table->timestamps();
            $table->string('full_name', 128);
            $table->string('gender', 10);
            $table->date('birthday');
            $table->string('email', 100)->unique();
            $table->string('current_team', 100);
            $table->string('position', 30);
            $table->string('password', 1000); // ハッシュ化されたパスワードを格納するための長さ
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
