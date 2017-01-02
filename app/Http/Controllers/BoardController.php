<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Post;

class BoardController extends Controller
{
    public function show($slug)
    {
        $board = Board::where('slug', $slug)->first();
        if (!$board) { abort(404, '404 Not Found'); }
        // $posts = $board->posts()->orderBy('created_at','desc')->paginate(15);
        return view('boards.show', [
            'board' => $board,
            // 'posts' => $posts
        ]);
    }
    public function posts($slug)
    {
        $board = Board::where('slug', $slug)->first();
        $posts = $board->posts()->orderBy('created_at','desc')->paginate(20);
        return $posts;
    }
    public function newPost($slug, Request $request)
    {
        $board = Board::where('slug', $slug)->first();
        $post = Post::create([
            'slug' => uniqid(),
            'user_id' => $request->user_id,
            'board_id' => $board->id,
            'title' => $request->title,
            'content' => $request->content
        ]);
        return $post;
    }
}
