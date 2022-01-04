<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'genre_id',
        'name',
        'abstract',
        'amount',
        'active',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
