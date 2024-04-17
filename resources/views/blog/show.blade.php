@extends('base')

@section('title', $post->title)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $post->title }}</h5>
                @if ($post->category)
                    <span class="badge bg-dark">{{ $post->category->name }}</span>
                @else
                    <span class="badge bg-secondary">Aucune catégorie</span>
                @endif
                @if ($post->tags->isNotEmpty())
                    <div class="mt-3">
                        @foreach ($post->tags as $tag)
                            <strong><span class="badge bg-info">{{ $tag->name }}</span></strong>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="card-body">
                <p class="card-text">{!! $post->content !!}</p>
            </div>
            <div class="card-footer text-muted">
                Publié le {{ $post->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
