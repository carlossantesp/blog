<div class="card mb-2">
  <div class="card-header text-white bg-dark">
    <h5 class="title m-0">Etiquetas</h5>
  </div>
  <div class="card-body py-2">
    @foreach($tags as $tag)
      <a href="{{ route('tag', $tag->slug) }}" class="p-2">{{ Str::limit($tag->name,20) }}</a>
    @endforeach
  </div>
</div>