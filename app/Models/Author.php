<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    public $timestamps = true;


    protected $fillable = [
        'name',
        'status'
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
