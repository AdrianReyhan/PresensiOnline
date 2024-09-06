<form id="delete-form-{{ $id }}" action="{{ url($url, $id) }}" method="post" 
      onclick="event.preventDefault(); deleteConfirmation({{ $id }})">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash"></i></button>
</form>
