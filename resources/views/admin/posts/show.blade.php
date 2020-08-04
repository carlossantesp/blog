@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header d-flex">
            <h5 class="card-title m-0">Detalle de la Entrada</h5>
          </div>
          <div class="card-body">
            @isset($post->file)
              <img src="{{ asset('/storage/' . $post->file) }}" class="img-fluid">
              <hr>
            @endisset
            <dl class="row">
              <dt class="col-md-3">Entrada</dt>
              <dd class="col-md-9">{{ $post->name }}</dd>
              <dt class="col-md-3">URL amigable</dt>
              <dd class="col-md-9">{{ $post->slug }}</dd>
              <dt class="col-md-3">Extracto de la entrada</dt>
              <dd class="col-md-9">{{ $post->excerpt }}</dd>
              <dt class="col-md-12">Contenido de la entrada</dt>
              <dd class="col-md-12">{!! $post->body !!}</dd>
            </dl>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title m-0">Información extra</h5>
          </div>
          <div class="card-body">
            <dl class="row">
              <dt class="col-md-3">Categoria</dt>
              <dd class="col-md-9">{{ $post->category->name }}</dd>
              <dt class="col-md-3">Estado</dt>
              <dd class="col-md-9 text-uppercase"><span class="badge badge-pill badge-{{ $post->color_status }}">{{ __($post->status) }}</span></dd>
              <dt class="col-md-3">Etiquetas</dt>
              <dd class="col-md-9">
                @forelse ($post->tags as $tag)
                  <span class="badge badge-light">{{ $tag->name }}</span>
                @empty
                  <em>Sin etiquetas</em>
                @endforelse
              </dd>
              <dt class="col-md-3">Autor</dt>
              <dd class="col-md-9">{{ $post->user->name }}</dd>
              <dt class="col-md-3">Creado</dt>
              <dd class="col-md-9">{{ $post->created_at->format('d M Y') }}</dd>
            </dl>

            <a href="{{ route('posts.index') }}" class="card-link">Volver atrás</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
