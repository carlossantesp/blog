@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <form action="{{ route('posts.update', $post->id) }}" method="POST"  enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="card-title m-0">Actualización de Entrada</h5>
            </div>
            <div class="card-body" id="form-app">
                @include('admin.posts.partials.form-noticia')
            </div>
          </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Configuración</h5>
              </div>
              <div class="card-body">
                @include('admin.posts.partials.form-adicional')
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mr-4">Actualizar</button>
                  <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver atrás</a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </form>
  </div>
@endsection