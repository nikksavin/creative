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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('title');
            $table->text('content')->nullable();
            $table->text('img_path')->nullable();
            $table->foreignId('profile_id')->index()->nullable()->constrained('profiles');
            $table->foreignId('category_id')->index()->nullable()->constrained('categories');
            $table->unsignedBigInteger('views')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->boolean('is_active')->nullable();

            $table->foreignId('parent_id')->index()->nullable()->constrained('posts');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
