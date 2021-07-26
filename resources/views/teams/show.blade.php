@extends('layouts.app')

@section('title', $team->name)

@section('content')
<h3>{{ $team->name }}</h3>
<p>Adress: <strong>{{ $team->adress }}</strong>  City: <strong>{{ $team->city }}</strong>   Email: <strong>{{ $team->email }}</strong></p>

@foreach($team->players as $player)
<p><a href="{{ route('show.players', ['player' => $player]) }}">{{ $player->first_name . ' ' . $player->last_name }}</a></p>
@endforeach
@endsection