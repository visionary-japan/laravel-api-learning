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
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(false)->comment('ユーザーID');
            $table->date('loan_date')->nullable(false)->comment('貸出日');
            $table->date('return_date')->comment('返却日');
            $table->date('due_date')->nullable(false)->comment('返却期日');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
