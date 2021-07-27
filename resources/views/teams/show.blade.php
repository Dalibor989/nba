@extends('layouts.app')

@section('title', $team->name)

@section('content')
<h3>{{ $team->name }}</h3>
<p>Adress: <strong>{{ $team->adress }}</strong>  City: <strong>{{ $team->city }}</strong>   Email: <strong>{{ $team->email }}</strong></p>

<h3>Comments:</h3>
@foreach($team->comments as $comment)
<div>{{$comment->content}}</div></br>
@endforeach

<h3>Squad:</h3>
@foreach($team->players as $player)
<p><a href="{{ route('show.players', ['player' => $player]) }}">{{ $player->first_name . ' ' . $player->last_name }}</a></p>
@endforeach

@auth
<form method="POST" action="{{ route('post.comment', ['team' => $team]) }}">
    @csrf
    <div class="form-group">
        <label for="body">Comment</label>
        <textarea name="body" class="form-control" id="body" rows="3" placeholder="Write your comment here..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endauth

@endsection