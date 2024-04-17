<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug :</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
        @error('slug')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="category_id">Catégorie :</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">-- Sélectionner une catégorie --</option>
            @foreach ($categories as $category)
                <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    @php
        $tagsIds = $post->tags()->pluck('id');
    @endphp
    <div class="form-group">
        <label for="tags">Tags :</label>
        <select name="tags[]" id="tags" class="form-control" multiple>
            @foreach ($tags as $tag)
                <option @if ($tagsIds->contains($tag->id)) selected @endif value="{{ $tag->id }}">
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        @error('tags')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group">
        <label for="content">Contenu :</label>
        <textarea name="content" id="content" class="form-control">{{ old('content', $post->content) }}</textarea>
        @error('content')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($post->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
