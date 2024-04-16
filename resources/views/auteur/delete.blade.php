<form action="{{ route('auteur.delete', ['auteur' => $auteur->slug]) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
