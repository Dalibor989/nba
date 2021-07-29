<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;
use App\Models\Team;
use App\Models\User;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $team;
    public $comment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, Team $team)
    {
        $this->comment = $comment;
        $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.comment-received', [
            'team' => $this->team,
            'user' => $this->comment->user,
            'comment' => $this->comment
        ])
            ->subject('Comment received');
    }
}
