<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function index($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->with('user')->get();
        return $comments;
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $post = Post::find($request->post_id);
        $comment = $post->comments()->create([
            'user_id' => $user->id,
            'content' => $request->content
        ]);
        return $comment->load('user');
    }

    public function destroy($id, Request $request)
    {
        $user = $request->user();
        $comment = Comment::find($id);
        if ($user->id == $comment->user_id) {
            $comment->delete();
        }
    }
}
