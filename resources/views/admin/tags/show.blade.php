@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">Información de la Etiqueta</h5>
            <a href="{{ route('tags.index') }}" class="btn btn-link">Volver atrás</a>
          </div>
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-2">Nombre de la Etiqueta</dt>
              <dd class="col-sm-4">{{ $tag->name }}</dd>
              <dt class="col-sm-2">URL amigable</dt>
              <dd class="col-sm-4">{{ $tag->slug }}</dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection