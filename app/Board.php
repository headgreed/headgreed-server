<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function posts()
    {
        return $this->hasMany(\App\Post::class);
    }
}
