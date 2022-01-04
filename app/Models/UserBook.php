<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    protected $table = 'users_books';
    
    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
