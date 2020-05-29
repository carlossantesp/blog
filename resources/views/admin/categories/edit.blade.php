@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Modificacion de Categoria</h5>
            <a href="{{ route('categories.index') }}" class="btn btn-link">Volver atrás</a>
          </div>
          <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
              @method('PUT')
              @csrf

              @include('admin.categories.partials.form')

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection