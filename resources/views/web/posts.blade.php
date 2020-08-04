@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <h2>Ultimas Publicaciones</h2>
        @forelse ($posts as $post)
        <div class="card mb-4">
          @isset($post->file)
            <img src="{{ asset('/storage/' . $post->file) }}" alt="{{ $post->name }}" class="img-fluid card-img-top" style="height: 300px; object-fit: cover">
          @endisset
          <div class="card-body">
            <h5 class="card-title">{{ $post->name }}</h5>
            <p class="text-muted"><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}</p>
            <p class="card-text">{{ $post->excerpt }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <i class="fas fa-user-edit mr-2 text-muted"></i>{{ $post->user->name }}
              <a href="{{ route('post',$post->slug) }}" class="card-link ml-auto">Leer más</a>
            </div>
          </div>
        </div>
        @empty
        <div class="card">
          <div class="card-body">
            <p class="lead text-center">No hay publicaciones</p>
          </div>
        </div>
        @endforelse
        {{ $posts->render() }}
      </div>

      <div class="col-md-3">
        @include('web.widgets.categories')
        @include('web.widgets.tags')
      </div>
    </div>
  </div>
@endsection
