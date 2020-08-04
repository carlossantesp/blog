@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="d-flex justify-content-between align-content-center mb-3">
          <h4>LISTADO DE MIS ENTRADAS</h4>
          <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Nueva entrada</a>
      </div>

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 col-sm-6">
                <div class="card-deck">
                    <div class="card my-1">
                    <img src="{{ asset('/storage/' . $post->file) }}" class="img-fluid card-img-top" style="height: 200px; object-fit:cover">
                    <div class="card-body pt-1">
                        <p class="text-uppercase m-0 pb-2 text-right">
                            <span class="badge badge-pill
                                        badge-{{ $post->color_status }}">
                                {{ __($post->status) }}
                            </span>
                        </p>
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <p class="card-text mb-1">{{ Str::limit($post->excerpt,100) }}</p>
                        <p class="card-text m-0 p-0"><small class="text-muted"><i class="fas fa-folder-open pr-3"></i> {{ $post->category->name }}</small></p>

                    </div>
                    <div class="card-footer text-right">
                        @include('admin.posts.partials.actions')
                    </div>
                </div>
                </div>
            </div>
        @empty
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <em class="text-center">No tienes entradas creadas</em>
                    </div>
                </div>
            </div>
        @endforelse
        {{ $posts->render() }}
    </div>
</div>
@endsection
