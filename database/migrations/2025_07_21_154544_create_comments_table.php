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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('profile_id')->index()->nullable()->constrained('profiles');
            $table->text('content')->nullable();
            $table->dateTime('date')->nullable();
//            $table->foreignId('post_id')->index()->nullable()->constrained('posts');
            $table->morphs('commentable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
