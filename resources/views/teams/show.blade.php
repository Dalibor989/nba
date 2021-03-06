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

<h3>News:</h3>

@foreach($team->news as $n)
<p><a href="{{ route('show.news', ['n' => $n]) }}">{{ $n->title }}</a></p>
@endforeach

@auth
<form method="POST" action="{{ route('post.comment', ['team' => $team]) }}">
    @csrf
    <div class="form-group">
        <label for="content">Comment</label>
        <textarea name="content" class="form-control" id="content" rows="3" placeholder="Write your comment here..."></textarea>
        @include('partials.error-message', [ 'field' => 'content' ])
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endauth

@endsection