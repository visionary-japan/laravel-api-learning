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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable(false)->max(255)->comment('タイトル');
            $table->text('author')->nullable(false)->max(255)->comment('著者');
            $table->integer('isbn')->unique()->max(13)->comment('ISBN番号');
            $table->date('published_date')->comment('公開日');
            $table->text('summary')->comment('概要');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
