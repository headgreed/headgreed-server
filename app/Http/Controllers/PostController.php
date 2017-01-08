<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Post;

class PostController extends Controller
{
    public function index($slug)
    {
        $board = Board::where('slug', $slug)->first();
        $posts = $board->posts()->with('post_category')
        ->with(['user' => function($q) {
            $q->select('id', 'name', 'gender', 'avatar');
            // $q->select('id', 'name', 'gender')->with(['facebook' => function($q){
            //     $q->select('user_id', 'profileUrl');
            // }]);
        }])
        ->orderBy('created_at','desc')->paginate(20);
        return $posts;
    }
    public function store($slug, Request $request)
    {
        $board = Board::where('slug', $slug)->first();
        $post = Post::create([
            'slug' => uniqid(),
            'user_id' => $request->user()->id,
            'board_id' => $board->id,
            'post_category_id' => $request->post_category ? $request->post_category : 1,
            'title' => $request->title,
            'content' => $request->content
        ]);
        return $post;
    }
}
