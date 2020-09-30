<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller {
    public function submit(Request $req) {
        $comment = new Comment();
        $comment->name = $req->input('name');
        $comment->message = $req->input('message');

        $comment->save();
    }

    public function allData() {
        $comment = new Comment();
        $data = [];
        $data = $comment->orderBy('id', 'desc')->get();
        return view('welcome', ['data' => $data]);
    }
}
