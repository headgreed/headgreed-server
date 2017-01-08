<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = \Auth::user();
        $posts = $user->posts()->with('board')->get();
        // return $posts;
        return view('users.profile', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function user(Request $request)
    {
        $user = [
            'id' => $request->user()->id,
        ];
        return $user;
    }

    public function posts(Request $request)
    {
        $user = $request->user();
        $posts = $user->posts()->with('board')->orderBy('created_at', 'desc')->get();
        return $posts;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10',
            'about' => 'max:255'
        ]);

        $user = $request->user();
        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);
        // return $user;
    }

    public function avatar()
    {
        $filename = \Auth::user()->avatar;
        $path = storage_path() . '/app/public/avatar/' . $filename; // file path
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function photo($file)
    {
        $path = storage_path() . '/app/public/avatar/' . $file; // file path
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
