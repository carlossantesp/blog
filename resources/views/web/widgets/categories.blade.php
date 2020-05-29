<div class="card mb-2">
  <div class="card-header text-white bg-dark">
    <h5 class="title m-0">Ultimas 10 Categorias</h5>
  </div>
  <div class="card-body p-0">
    <ul class="list-group list-group-flush">
      @foreach($categories as $category)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('category', $category->slug) }}">{{ Str::limit($category->name,20) }}</a>
        <span class="badge badge-dark badge-pill">{{ $category->posts_count }}</span>
      </li>
      @endforeach
    </ul>
  </div>
</div>