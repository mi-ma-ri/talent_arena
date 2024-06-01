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
        Schema::create('team_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scouts_team_id');
            $table->foreign('scouts_team_id')->references('id')->on('scouts_team')->onDelete('cascade');
            $table->string('ground1', 30);
            $table->string('ground_2', 30)->nullable();
            $table->string('ground_3', 30)->nullable();
            $table->string('members', 100);
            $table->string('coach', 30);
            $table->string('weekly_schedule', 100);
            $table->string('tr_time', 100);
            $table->string('pitch', 30);
            $table->string('expenses');
            $table->string('dormitory');
            $table->string('conditions');
            $table->boolean('is_part_time_allowed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_details');
    }
};
