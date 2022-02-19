<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'email'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
