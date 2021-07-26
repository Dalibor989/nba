@extends('layouts.app')

@section('title', $player->name)

@section('content')
<h3>{{ $player->first_name }} {{ $player->last_name }}</h3>
{{$player->team->name}}
@endsection