@extends('layouts.app')

@section('title', $player->name)

@section('content')
<h3>{{ $player->first_name }} {{ $player->last_name }}</h3>
<p>Email: <strong>{{ $player->email }}</strong></p>
Team: <a href="/">{{$player->team->name}}</a>
@endsection