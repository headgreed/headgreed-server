<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    // many to many
    public function boards()
    {
        return $this->belongsToMany('App\Board');
    }
}
