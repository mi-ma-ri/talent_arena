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
        Schema::table('auth_keys', function (Blueprint $table) {
            $table->renameColumn('role_id', 'subject_id');
            $table->renameColumn('user_type', 'subject_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auth_keys', function (Blueprint $table) {
            $table->renameColumn('subject_id', 'role_id');
            $table->renameColumn('subject_type', 'user_type');
        });
    }
};
