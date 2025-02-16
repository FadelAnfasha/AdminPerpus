<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returning extends Model
{
    use HasFactory;
    protected $table = 'returneds';
    public $timestamps = false;  // Menonaktifkan timestamps Eloquent

    protected $fillable = [
        'return_date', 'borrowing_id', 'user_id', 'book_id'
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

    public function borrow()
    {
        return $this->belongsTo(BorrowHistory::class, 'borrowing_id');
    }
}
