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

<form action="{{ route('author.store')}}" method="post">
  @csrf
  <div class="mb-3 input-group">
    <label for="name" class="input-group-text">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Name here" value1="{{old('name')}}" value="{{$model->name}}" />
  </div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>