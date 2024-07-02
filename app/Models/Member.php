<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'gender',
        'address',
        'phoneNumber',
        'photo'
    ];

    public function borrow()
    {
        return $this->hasMany(Borrow::class);
    }
}
