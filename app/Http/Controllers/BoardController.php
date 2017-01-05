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
}
