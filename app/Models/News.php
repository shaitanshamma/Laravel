<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews()
    {
       return DB::table($this->table)->select()->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table($this->table)->find($id);
    }
}
