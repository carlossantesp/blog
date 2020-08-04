@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <h1>{{ $post->name }}</h1>
        <div class="card">
          @isset($post->file)
            <img src="{{ asset('/storage/' . $post->file) }}" alt="" class="img-fluid card-img-top">
          @endisset
          <div class="card-body">
            <p class="text-muted"><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}</p>
            <h6 class="card-subtitle mb-2 text-muted">
              <i class="fas fa-folder-open pr-3"></i>
              <a href="{{ route('category', $post->category->slug) }}" class="card-link">{{ $post->category->name }}</a>
            </h6>

            <p class="card-text">{{ $post->excerpt }}</p>
            <hr>
            {!! $post->body !!}
            <h6 class="card-subtitle mt-4 mb-2 text-muted">
              <i class="fas fa-tags pr-3"></i>
              @foreach ($post->tags as $tag)
                <a href="{{ route('tag', $tag->slug) }}" class="card-link">{{ $tag->name }}</a>
              @endforeach
            </h6>
            <hr>
            <i class="fas fa-user-edit mr-2 text-muted"></i><span class="font-italic">{{ $post->user->name }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        @include('web.widgets.categories')
        @include('web.widgets.tags')
      </div>
    </div>
  </div>
@endsection
