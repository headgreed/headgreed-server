<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardCategory;
use App\Board;
use App\Post;

class BoardController extends Controller
{
    public function show($slug)
    {
        $board = Board::where('slug', $slug)
        ->with(['post_categories' => function($q) {
            $q->select('id', 'name');
        }])
        ->first();

        if (!$board) { abort(404, '404 Not Found'); }
        // $posts = $board->posts()->orderBy('created_at','desc')->paginate(15);
        return view('boards.show', [
            'board' => $board,
            // 'posts' => $posts
        ]);
    }

    public function index()
    {
        $boards = BoardCategory::with('boards')->get();
        return $boards;
    }

    public function getBoard($slug)
    {
        $board = Board::where('slug', $slug)
        ->with(['post_categories' => function($q) {
            $q->select('id', 'name');
        }])
        ->first();
        return $board;
    }
}
