@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>
      {{$error}}
    </li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('upload-file')}}" method="post" enctype="multipart/form-data">

  @csrf

  <div class="mb-3 input-group">
    <label for="name" class="input-group-text">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Name here" value="{{old('name')}}" />
  </div>

  <div class="mb-3">
    <input class="form-control" name="file" type="file" id="file" value="{{old('file')}}" />
  </div>


  <div class="mb-3 input-group">
    <label for="author" class="input-group-text">Author</label>

    <select class="form-select" aria-label="Default select example" name="author">
      <option value="">Open this select menu</option>
      @foreach ($authors as $author):
      <option value="{{$author->id}}" @if (old('author')==$author->id) selected="selected" @endif>{{$author->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3 input-group">
    <label for="category" class="input-group-text">Category</label>

    <select class="form-select" aria-label="Default select example" name="category">
      <option value="">Open this select menu</option>
      @foreach ($categories as $category):
      <option value="{{$category->id}}" @if (old('category')==$category->id) selected="selected" @endif>{{$category->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3 input-group">
    <label for="album" class="input-group-text">Album</label>

    <select class="form-select" aria-label="Default select example" name="album">
      <option value="">Open this select menu</option>
      @foreach ($albums as $album)
      <option value="{{$album->id}}" @if (old('album')==$album->id) selected="selected" @endif>{{$album->name}}</option>
      @endforeach
    </select>
  </div>

  


<button type="submit" class="btn btn-primary">Submit</button>

</form>