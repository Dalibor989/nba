<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Comment;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentReceived;

class CommentController extends Controller
{
    public function store(Team $team, CreateCommentRequest $request)
    {
        info('neka tekst');
        $data = $request->validated();
        $comment = new Comment;
        $comment->content = $data['content'];

        $comment->team()->associate($team);
        $comment->user()->associate(auth()->user());
        $comment->save();

        Mail::to($team)->send(
            new CommentReceived($comment, $team)
        );

        return back();
    }

}
