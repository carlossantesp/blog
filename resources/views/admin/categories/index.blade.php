@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">LISTADO DE CATEGORIAS</h5>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Nueva categoria</a>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped table-hover">
              <thead class="thead-dark">
                <tr>
                  <th width="10px">#</th>
                  <th>Nombre</th>
                  <th>URL amigable</th>
                  <th width="30%">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>
                    @include('admin.categories.partials.actions')
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4">
                    <em class="text-center">No tienes categorias creadas</em>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $categories->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection