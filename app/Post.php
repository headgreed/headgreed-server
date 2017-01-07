<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug', 'user_id', 'board_id', 'title', 'content'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');//->select(['id', 'name']); //select in controller
    }

    public function board()
    {
        return $this->belongsTo('App\Board');
    }
}
