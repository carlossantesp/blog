<a href="{{ route('tags.show',$tag->id) }}" class="btn-sm btn btn-secondary d-inline mr-2">
  <i class="fas fa-eye"></i> Ver
</a>
<a href="{{ route('tags.edit',$tag->id) }}" class="btn-sm btn btn-info d-inline text-white mr-2">
  <i class="fas fa-edit"></i> Editar
</a>
<form action="{{ route('tags.destroy',$tag->id) }}" method="POST" class="d-inline">
  @method('DELETE')
  @csrf
  <button type="submit" class="btn-sm btn btn-danger">
    <i class="fas fa-trash"></i> Eliminar
  </button>
</form>