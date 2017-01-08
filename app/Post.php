<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'slug', 'user_id', 'board_id', 'post_category_id', 'title', 'content'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');//->select(['id', 'name']); //select in controller
    }

    public function board()
    {
        return $this->belongsTo('App\Board');
    }

    public function post_category()
    {
        return $this->belongsTo('App\PostCategory')->select(['id', 'name']);;
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
