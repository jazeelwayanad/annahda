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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->noActionOnDelete();
            $table->foreignId('category_id')->constrained()->noActionOnDelete();
            $table->text('title');
            $table->text('slug');
            $table->longText('content');
            $table->text('thumbnail');
            $table->enum('status', ['draft', 'scheduled', 'published', 'reviewing', 'requested', 'rejected'])->default('draft');
            $table->boolean('reviewed')->default(false);
            $table->boolean('comments')->default(true);
            $table->text('meta_title');
            $table->text('meta_description');
            $table->text('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->boolean('premium')->default(false);
            $table->integer('views')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_tag');
    }
};
