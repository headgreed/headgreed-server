<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    public function show($slug)
    {
        $board = Board::where('slug', $slug)->first();
        if (!$board) { abort(404, '404 Not Found'); }
        $posts = $board->posts()->paginate(15);
        return view('boards.show', [
            'board' => $board,
            'posts' => $posts
        ]);
    }
    public function posts($slug)
    {
        $board = Board::where('slug', $slug)->first();
        $posts = $board->posts()->paginate(20);
        return $posts;
    }
}
