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
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf()

            <div class="mb-5"><label class="form-label">Titolo</label><input type="text" class="form-control"
                    name="title">
            </div>
            <div class="mb-5"><label class="form-label">Categoria</label><select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5"><label class="form-label">Immagine</label><input type="file" accept="image/*"
                    class="form-control" name="image">
            </div>
            <div class="mb-5"><label class="form-label">Contenuto</label>
                <textarea class="form-control" name="body"></textarea>
            </div>

            <button class="btn btn-primary">Crea</button>

        </form>
    </div>
@endsection
