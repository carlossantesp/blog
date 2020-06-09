<div class="form-group">
  <label for="category_id">Categorias</label>
  <select name="category_id" id="category_id" class="custom-select @error('category_id') is-invalid @enderror" >
    <option value="">Seleccione una categoria</option>
    @foreach ($categories as $key => $category)
      <option {{ old('category_id') == $key ? 'selected' : ($post->category_id == $key ? 'selected' : '') }} value="{{ $key }}">{{ $category }}</option>
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
      <input class="custom-control-input" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : ($post->tags->contains($tag->id) ? 'checked' : '') }} type="checkbox" name=tags[] value="{{ $tag->id }}" id="{{ 'tag-'.$loop->index }}">
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

@isset ($post->file)
  <div class="form-group">
    <img src="{{ asset($post->file) }}" alt="" class="img-fluid">
  </div>
@endisset

<div class="form-group">
  <label for="status">Estado</label>
  <div class="custom-control custom-radio custom-control-inline">
    <input class="custom-control-input @error('status') is-invalid @enderror" type="radio" name="status" {{ old('status') == 'publish' ? 'checked' : ($post->status == 'publish' ? 'checked' : '') }} value="publish" id="publish">
    <label class="custom-control-label" for="publish">
      Publicado
    </label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input class="custom-control-input @error('status') is-invalid @enderror" type="radio" name="status" {{ old('status') == 'draft' ? 'checked' : ($post->status == 'draft' ? 'checked' : '') }} value="draft" id="draft">
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

<div class="form-group">
  <button type="submit" class="btn btn-primary mr-4">{{ $btnText }}</button>
  <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver atrás</a>
</div>