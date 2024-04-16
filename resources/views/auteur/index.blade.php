@extends('base')

@section('title', 'Accueil auteur')

@section('content')
    <h1>Liste des auteurs</h1>
    <div style="padding: 2rem 0">
        <a href="{{ route('auteur.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Créer un auteur</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auteurs as $auteur)
                <tr>
                    <td>{{ $auteur->prenom }}</td>
                    <td>{{ $auteur->nom }}</td>
                    <td>{{ $auteur->email }}</td>
                    <td>{{ $auteur->descriptif }}</td>
                    <td>
                        <a href="{{ route('auteur.show', ['auteur' => $auteur->slug]) }}" class="btn btn-primary">Voir
                            plus</a>
                        <a href="{{ route('auteur.edit', ['auteur' => $auteur->slug]) }}" class="btn btn-warning">Modifier</a>
                        @include('auteur.delete', ['post' => $auteur])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination" style="margin: 1rem;">
        {{ $auteurs->links() }}
    </div>
@endsection
