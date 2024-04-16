@extends('base')

@section('title', $auteur->prenom . ' ' . $auteur->nom)

@section('content')
    <article>
        <h1>{{ $auteur->nom }} {{ $auteur->prenom }}</h1>
        <p>{{ $auteur->email }}</p>
        <p>
            {!! $auteur->descriptif !!}
        </p>
    </article>
@endsection
