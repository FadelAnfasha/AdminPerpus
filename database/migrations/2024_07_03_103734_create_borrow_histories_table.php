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
        Schema::create('borrow_histories', function (Blueprint $table) {
            $table->id();
            $table->date('borrow_date');
            $table->date('return_date');
            $table->foreignId('member_id')->constrained('members')->index('histborrow_member_id');
            $table->foreignId('user_id')->constrained('users')->index('histborrow_user_id');
            $table->foreignId('book_id')->constrained('books')->index('histborrow_book');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_histories');
    }
};
