@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nuovo Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger"></div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('admin.posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf()
            @method('PATCH')

            <div class="mb-5"><label class="form-label">Titolo</label><input type="text" class="form-control" name="title"
                    value="{{ $post->title }}">
            </div>
            <div class="mb-3"><label class="form-label">Data Pubblicazione</label><input type="date"
                    class="form-control" name="published_at" value="{{ $post->published_at?->toDateString() }}"></div>
            <div class="mb-5"><label class="form-label">Categoria</label><select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id === $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5"><label class="form-label">Immagine</label>
                @if ($post->image)
                    <img src="{{ asset('/storage/' . post->image) }}" alt="" class="img-thumbnail"
                        style="width: 100px">
                @endif
                <input type="file" accept="image/*" class="form-control" name="image/*">
            </div>
            <div class="mb-5"><label class="form-label">Contenuto</label>
                <textarea class="form-control" name="body">{{ $post->body }}</textarea>
            </div>
            <div class="mb-5">
                <div class="form-check">
                    <input type="hidden" name="is_published" value="0">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published_input"
                        {{ $post->is_published ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="is_published_input">
                        Pubblicato
                    </label>
                </div>
            </div>

            <button class="btn btn-primary">Aggiorna</button>

        </form>
    </div>
@endsection
