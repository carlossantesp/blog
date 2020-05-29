@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">Modificación de Etiqueta</h5>
            <a href="{{ route('tags.index') }}" class="btn btn-link">Volver atrás</a>
          </div>
          <div class="card-body" id="form-app">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST">
              @method('PUT')
              @csrf
              
              @include('admin.tags.partials.form')

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar Etiqueta</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection