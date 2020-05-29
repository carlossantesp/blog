<div class="form-group">
  <label for="category_id">Categorias</label>
  <select name="category_id" class="custom-select @error('category_id') is-invalid @enderror" >
    <option value="">Seleccione una categoria</option>
    @foreach ($categories as $category)
      <option {{ old('category_id') == $category->id ? 'selected': (isset($post) ? ($post->category_id == $category->id ? 'selected' : '') : '') }} value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  @error('category_id')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="form-group">
  <label for="tags">Etiquetas</label> <br>
  @foreach ($tags as $tag)
    <div class="custom-control custom-checkbox custom-control-inline">
      <input class="custom-control-input" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : (isset($post) ? ($post->tags->contains($tag->id) ? 'checked' : '') : '') }} type="checkbox" name=tags[] value="{{ $tag->id }}" id="{{ 'tag-'.$loop->index }}">
      <label class="custom-control-label" for="{{ 'tag-'.$loop->index }}">
        {{ $tag->name }}
      </label>
    </div>
  @endforeach
</div>

<div class="form-group">
  <label for="file">Imagen de portada</label>
  <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
  @error('file')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>
@isset($post)
  @isset ($post->file)
  <div class="form-group">
    <img src="{{ asset($post->file) }}" alt="" class="img-fluid">
  </div>
  @endisset
@endisset

<div class="form-group">
  <label for="status">Estado</label>
  <div class="custom-control custom-radio custom-control-inline">
    <input class="custom-control-input @error('status') is-invalid @enderror" type="radio" name="status" {{ old('status') == 'publish' ? 'checked' : (isset($post) ? ($post->status == 'publish' ? 'checked' : '') : '') }} value="publish" id="publish">
    <label class="custom-control-label" for="publish">
      Publicado
    </label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input class="custom-control-input @error('status') is-invalid @enderror" type="radio" name="status" {{ old('status') == 'draft' ? 'checked' : (isset($post) ? ($post->status == 'draft' ? 'checked' : '') : '') }} value="draft" id="draft">
    <label class="custom-control-label" for="draft">
      Borrador
    </label>
    @error('status')
      <span class="ml-2 invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>
