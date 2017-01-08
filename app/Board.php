<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    // many to many
    public function post_categories()
    {
        return $this->belongsToMany('App\PostCategory');
    }

    public function posts()
    {
        return $this->hasMany(\App\Post::class);
    }
}
