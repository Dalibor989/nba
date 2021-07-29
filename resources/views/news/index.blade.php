@extends('layouts.app')

@section('title', 'News')

@section('content')
    <ul>
        @foreach($news as $n)
        <li><a href="{{ route('show.news', ['n' => $n]) }}">{{ $n->title }}</a> posted by: {{ $n->user->name }}</li> 
        @endforeach
    </ul>
    <ul>
        @foreach($teams as $team)
        <li><a href="">{{ $team->name }}</a></li> 
        @endforeach
    </ul>
    <div>
    {{ $news->links() }}
    </div>
@endsection