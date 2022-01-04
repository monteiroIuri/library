<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookshelf_id',
        'title',
        'description',
        'active',
    ];

    public function bookshelf()
    {
        return $this->belongsTo(Bookshelf::class);
    }
}
