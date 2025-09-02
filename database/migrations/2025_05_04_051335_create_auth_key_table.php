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
        Schema::create('auth_keys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->comment('選手またはチームのID');
            $table->tinyInteger('user_type')->comment('0:選手, 1:チーム');
            $table->string('auth_key', 128)->comment('認証キー');
            $table->dateTime('auth_date')->nullable()->comment('認証日時');
            $table->dateTime('expire_date')->comment('認証有効期限');
            $table->timestamp('created_at')->useCurrent()->comment('作成日時');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_key');
    }
};
