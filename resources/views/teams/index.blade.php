@extends('layouts.app')

@section('title', 'Teams')

@section('content')
    <ul>
        @foreach($teams as $team)
        <li><a href="{{ route('show.teams', ['team' => $team]) }}">{{ $team->name }}</a></li>
        @endforeach
    </ul>
@endsection