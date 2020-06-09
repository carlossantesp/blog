@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">Creación de Etiqueta</h5>
            <a href="{{ route('tags.index') }}" class="btn btn-link">Volver atrás</a>
          </div>
          <div class="card-body">
            <form action="{{ route('tags.store') }}" method="POST">

              @include('admin.tags.partials.form',['btnText' => 'Registrar Etiqueta'])

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection