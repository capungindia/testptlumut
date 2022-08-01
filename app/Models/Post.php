<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'idpost';
    public $timestamps = false;

    protected $fillable = [
        'title', 'content', 'date', 'username',
    ];
}