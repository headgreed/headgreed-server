<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug', 'user_id', 'board_id', 'title', 'content'
    ];
}
