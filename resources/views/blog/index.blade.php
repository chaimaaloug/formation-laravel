@extends('base')

@section('title', 'Accueil du Blog')

@section('content')
    <h1>Liste des blogs</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('blog.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Créer un blog</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('blog.show', ['post' => $post->slug]) }}" class="btn btn-primary">Voir plus</a>
                        <a href="{{ route('blog.edit', ['post' => $post->slug]) }}" class="btn btn-warning">Modifier</a>
                        @include('blog.delete', ['post' => $post])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $posts->links() }}
    </div>
@endsection
