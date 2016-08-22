@extends('app')

@section('body')
    @foreach( $articles as $article )
        <h1><a href="{{ url('article',$article->id) }}">{{ $article->title }}</a></h1>

        <h2>{{ $article->content }}</h2>
    @endforeach
@stop