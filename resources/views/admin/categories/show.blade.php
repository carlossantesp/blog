@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">Información de la Categoria</h5>
            <a href="{{ route('categories.index') }}" class="btn btn-link ">Volver atrás</a>
          </div>
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-3">Nombre de la Categoria</dt>
              <dd class="col-sm-9">{{ $category->name }}</dd>
              <dt class="col-sm-3">URL amigable</dt>
              <dd class="col-sm-9">{{ $category->slug }}</dd>
              @isset($category->body)
              <dt class="col-sm-3">Descripción</dt>
              <dd class="col-sm-9">{{ $category->body }}</dd>    
              @endisset
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection