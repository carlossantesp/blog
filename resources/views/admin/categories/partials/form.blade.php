@csrf

<div class="form-group">
  <label for="name">Nombre</label>
  <input type="text" id="name" name="name" id="name" placeholder="Nombre de la Categoria" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" autofocus autocomplete="off">
  @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="form-group">
  <label for="slug">Url amigable</label>
  <input type="text" id="slug" name="slug" id="slug" placeholder="url-amigable" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $category->slug) }}">
  @error('slug')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="form-group">
  <label for="body">Descripción</label>
  <textarea type="text" id="body" rows="5" name="body" placeholder="Descripcion breve" class="form-control">{{ old('body', $category->body) }}</textarea>
</div>

<div class="form-group">
  <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
</div>

@section('scripts')
<script src="{{ asset('plugins/stringToSlug/stringToSlug.js') }}"></script>
<script>
  SlugCreator.title = document.getElementById('name');
  SlugCreator.slug = document.getElementById('slug');
  SlugCreator.init();
</script>
@endsection