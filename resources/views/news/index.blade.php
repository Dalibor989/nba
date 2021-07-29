@extends('layouts.app')

@section('title', 'Teams')

@section('content')
    <ul>
        @foreach($news as $n)
        <li><a href="{{ route('show.news', ['n' => $n]) }}">{{ $n->title }}</a> posted by: {{ $n->user->name }}</li> 
        @endforeach
    </ul>

    <div>
    {{ $news->links() }}
    </div>
@endsection