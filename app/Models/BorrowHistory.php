<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowHistory extends Model
{
    use HasFactory;
    protected $table = 'borrow_histories';
    public $timestamps = false;  // Menonaktifkan timestamps Eloquent


    protected $fillable = [
        'borrow_date', 'return_date', 'member_id', 'user_id', 'book_id'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function returning()
    {
        return $this->hasOne(Returning::class, 'borrowing_id');
    }
}
