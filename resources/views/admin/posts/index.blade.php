@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei post</h1>

        <div class="bg-light my-4">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-link">Nuovo post</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <td>Titolo</td>
                    <td>Immagine</td>
                    <td>Categoria</td>
                    <td>Data Pubblicazione</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td><img src={{ asset('/storage/' . $post->image) }} alt="" class="img-thumbnail"
                                style="width: 100px"></td>
                        <td><span class="badge"
                                style="background-color: rgb({{ $post->category->color }})">{{ $post->category->name }}</span>
                        </td>
                        <td>{{ $post->published_at?->format('d/m/Y H:i') }}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info">Dettagli</a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST"
                                class="d-inline-block">
                                @csrf()
                                @method('DELETE')

                                <button class="btn btn-danger"><i class="fas fa-trash"></i>Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
