<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scouts_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sports_id')->constrained('sports');
            $table->timestamps();
            $table->string('team_name', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 1000); // ハッシュ化されたパスワードを格納するための長さ
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scouts_team');
    }
};
