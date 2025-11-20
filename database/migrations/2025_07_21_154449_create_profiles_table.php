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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('second_name')->nullable();
            $table->string('third_name')->nullable();
            $table->string('avatar_path')->nullable();
            $table->string('city')->nullable();
            $table->string('login')->nullable();
            $table->string('chat')->nullable();
            $table->foreignId('user_id')->index()->nullable()->constrained('users');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
