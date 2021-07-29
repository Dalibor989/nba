@extends('layouts.app')

@section('title', $n->title)

@section('content')
<h3>{{ $n->title }}</h3>
<p>{{ $n->content }}</p>

<p>{{ $n->user->name }}</p>
<p>{{ $n->user->email }}</p>

@endsection