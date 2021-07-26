<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Comment;
use App\Http\Requests\CreateCommentRequest;

class CommentController extends Controller
{
    public function store(Team $team, CreateCommentRequest $request)
    {
        $data = $request->validated();
        info('neka tekst');
        $comment = new Comment;
        $comment->content = $data['content'];

        $comment->team()->associate($team);
        $comment->user()->associate(auth()->user());
        $comment->save();

        return back();
    }
}
