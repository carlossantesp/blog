@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">LISTADO DE ETIQUETAS</h5>
            <a href="{{ route('tags.create') }}" class="btn btn-primary btn-sm">Nueva etiqueta</a>
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
                @forelse ($tags as $tag)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $tag->name }}</td>
                  <td>{{ $tag->slug }}</td>
                  <td>
                    @include('admin.tags.partials.actions')
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4">
                    <em class="text-center">No tienes etiquetas creadas</em>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $tags->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection