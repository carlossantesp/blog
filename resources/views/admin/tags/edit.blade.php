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
          <div class="card-body">
            <form action="{{ route('tags.update', $tag->slug) }}" method="POST">
              @method('PUT')

              @include('admin.tags.partials.form',['btnText' => 'Actualizar Etiqueta'])

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
