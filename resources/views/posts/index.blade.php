@extends('app')

@section('content')
  <ul>
    @foreach($posts as $post)
      <li>
        {{ $post->title }} - <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
        | <a href="{{ route('posts.show', $post->id) }}">Ver</a>
      </li>
    @endforeach
  </ul>
@endsection
