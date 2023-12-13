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

<form action="{{ route('album.store')}}" method="post">

  @csrf

  <div class="mb-3 input-group">
    <label for="name" class="input-group-text">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Name here" value="{{old('name')}}" />
  </div>


  <div class="mb-3 input-group">
    <label for="author" class="input-group-text">Author</label>

    <select class="form-select" aria-label="Default select example" name="author">
        <option selected value="">(None)</option>

        @foreach ($authors as $id => $name)
        <option value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>