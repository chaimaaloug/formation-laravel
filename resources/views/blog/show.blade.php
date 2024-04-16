@extends('base')

@section('title', $post->title)

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->created_at->format('d/m/Y') }}</p>
        <p>
            {!! $post->content !!}
        </p>
    </article>
@endsection
