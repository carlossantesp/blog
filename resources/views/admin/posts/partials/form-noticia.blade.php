<input type="hidden" name="user_id" value="{{ auth()->id() }}">

<div class="form-group">
  <label for="name">Titulo</label>
  <input type="text" name="name" id="name" placeholder="Titulo de la entrada" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? (isset($post) ? $post->name :"") }}" autofocus autocomplete="off">
  @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="form-group">
  <label for="slug">Url amigable</label>
  <input type="text" name="slug" id="slug" placeholder="url-amigable" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? (isset($post) ? $post->slug :"") }}">
  @error('slug')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="form-group">
  <label for="excerpt">Extracto</label>
  <textarea type="text" rows="2" name="excerpt" placeholder="Resumen de la entrada" class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt') ?? (isset($post) ? $post->excerpt : '') }}</textarea>
  @error('excerpt')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="form-group">
  <label for="body">Contenido</label>
  <textarea type="text" rows="5" name="body" placeholder="Contenido de la entrada" class="form-control @error('body') is-invalid @enderror">{{ old('body') ?? (isset($post) ? $post->body : '') }}</textarea>
  @error('body')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

@section('scripts')
<script src="{{ asset('plugins/stringToSlug/stringToSlug.js') }}"></script>
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

<script>
  SlugCreator.title = document.getElementById('name');
  SlugCreator.slug = document.getElementById('slug');
  SlugCreator.init();

  CKEDITOR.config.height = 400;
  CKEDITOR.config.width = 'auto';
  CKEDITOR.replace('body');
</script>
@endsection