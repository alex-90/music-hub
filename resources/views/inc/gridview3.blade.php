<table class="table table-striped table-hover table-bordered table-sm">

<thead>
  <tr>
    @foreach($fields as $field)
    <td>{{$field}}</td>
    @endforeach
  </tr>
</thead>

<tbody>


@foreach($data as $row)
<tr>

  @foreach($fields as $field)
  <td>{{$row->$field}}</td>
  @endforeach
  
  <td>
    <a class="btn btn-sm btn-primary float-start me-1" href="{{route($name . '.edit', $row->id)}}" role="button">Edit</a>
    
    @include('inc._form-delete-button', ['url' => route($name . '.destroy', $row->id)])

  </td>
  
</tr>
@endforeach
</tbody>

</table>

