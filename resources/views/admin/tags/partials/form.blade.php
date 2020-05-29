<div class="form-group">
  <label for="name">Nombre</label>
  <input type="text" name="name" id="name" placeholder="Nombre de la Etiqueta" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? (isset($tag) ? $tag->name :"") }}" autofocus autocomplete="off">
  @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="form-group">
  <label for="slug">Url amigable</label>
  <input type="text" name="slug" id="slug" placeholder="url-amigable" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? (isset($tag) ? $tag->slug :"") }}">
  @error('slug')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

@section('scripts')
<script src="{{ asset('plugins/stringToSlug/stringToSlug.js') }}"></script>
<script>
  SlugCreator.title = document.getElementById('name');
  SlugCreator.slug = document.getElementById('slug');
  SlugCreator.init();
</script>
@endsection