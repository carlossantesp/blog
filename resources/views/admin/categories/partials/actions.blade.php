<a href="{{ route('categories.show',$category->id) }}" class="btn-sm btn btn-secondary d-inline mr-2">
  <i class="fas fa-eye"></i> Ver
</a>
<a href="{{ route('categories.edit',$category->id) }}" class="btn-sm btn btn-info d-inline text-white mr-2">
  <i class="fas fa-edit"></i> Editar
</a>
<form action="{{ route('categories.destroy',$category->id) }}" method="POST" class="d-inline">
  @method('DELETE')
  @csrf
  <button type="submit" class="btn-sm btn btn-danger">
    <i class="fas fa-trash"></i> Eliminar
  </button>
</form>