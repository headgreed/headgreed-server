<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    public function show($slug)
    {
        $board = Board::where('slug', $slug)->first();
        if (!$board) {
            abort(404, '404 Not Found');
        }
        return view('boards.show', [
            'board' => $board
        ]);
    }
}
