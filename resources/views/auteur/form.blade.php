<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" name="nom" value="{{ old('nom', $auteur->nom) }}">
        @error('nom')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" class="form-control" name="prenom" value="{{ old('prenom', $auteur->prenom) }}">
        @error('prenom')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" name="email" value="{{ old('email', $auteur->email) }}">
        @error('email')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug :</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $auteur->slug) }}">
        @error('slug')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="descriptif">Desctiptif :</label>
        <textarea name="descriptif" id="descriptif" class="form-control" cols="30" rows="10">
            {{ old('descriptif', $auteur->descriptif) }}
        </textarea>
        @error('descriptif')
            {{ $message }}
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($auteur->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
