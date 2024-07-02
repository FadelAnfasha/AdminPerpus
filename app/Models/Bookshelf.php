<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    use HasFactory;
    protected $table = 'bookshelves';
    public $timestamps = true;
    // Specify the custom primary key field
    protected $primaryKey = 'code';

    // Indicate that the primary key is not an auto-incrementing integer
    public $incrementing = false;

    // Specify the type of the primary key field if necessary
    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'location'
    ];
}
