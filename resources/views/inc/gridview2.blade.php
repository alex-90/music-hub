<table class="table table-striped table-hover table-bordered table-sm">

<thead>
  <tr>
    @foreach($fields as $field)
    <td>{{$field}}</td>
    @endforeach
    
    <th></th>  
  </tr>
</thead>

<tbody>


@foreach($data as $row)
<tr>

  @foreach($fields as $field)
  <td>{{$row->$field}}</td>
  @endforeach
  
  <td>
    <a class="btn btn-sm btn-primary float-start me-1" href="{{route('author.edit', $row->id)}}" role="button">Edit</a>
    
    @include('inc._form-delete-button', ['url' => route('author.destroy', $row->id)])

  </td>
  
</tr>
@endforeach
</tbody>

</table>

