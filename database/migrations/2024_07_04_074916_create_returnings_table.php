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
        Schema::create('returneds', function (Blueprint $table) {
            $table->id();
            $table->date('return_date');
            $table->foreignId('borrowing_id')->constrained('borrow_histories')->index('borrow_detail');
            $table->foreignId('user_id')->constrained('users')->index('return_user');
            $table->foreignId('book_id')->constrained('books')->index('return_book');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returnings');
    }
};
