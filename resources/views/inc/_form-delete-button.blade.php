<form action="{{ $url }}" method="post">

  @method('DELETE')
  @csrf

<button type="submit" class="btn btn-sm btn-danger">Delete</button>

</form>