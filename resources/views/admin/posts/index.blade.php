@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">LISTADO DE MIS ENTRADAS</h5>
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Nueva entrada</a>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped table-hover">
              <thead class="thead-dark">
                <tr>
                  <th width="10px">#</th>
                  <th>Nombre</th>
                  <th>Extracto</th>
                  <th>Categoria</th>
                  <th>Estado</th>
                  <th width="20%">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($posts as $post)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $post->name }}</td>
                  <td>{{ Str::limit($post->excerpt,50) }}</td>
                  <td>{{ $post->category->name }}</td>
                  <td class="text-uppercase"><span class="badge badge-pill badge-{{ $post->status == 'publish' ? 'primary' : 'secondary'}}">{{ __($post->status) }}</span></td>
                  <td>
                    @include('admin.posts.partials.actions')
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4">
                    <em class="text-center">No tienes entradas creadas</em>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $posts->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection