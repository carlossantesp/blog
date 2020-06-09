@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">Creación de Categoria</h5>
            <a href="{{ route('categories.index') }}" class="btn btn-link">Volver atrás</a>
          </div>
          <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">

              @include('admin.categories.partials.form',['btnText' => 'Registrar Categoria'])

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection