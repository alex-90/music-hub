<table class="table table-striped table-hover table-bordered table-sm">

<thead>
  <tr>
    <th>ID</td>
    <th>title</th>
    <th>creator_id</th>
    
    <th>size</th>
    <th>time</th>
    <th>album_id</th>
    <th>author_id</th>

    <th>created_at</th>
    <th>updated_at</th>
    
    <th></th>  
  </tr>
</thead>

<tbody>



@foreach($files as $row)
<tr>
  <td>{{$row->id}}</td>
  <td>{{$row->title}}</td>
  <td>{{$row->creator->username}}</td>
  
  <td>{{$row->size}}</td>
  <td>{{$row->time}}</td>
  <td>{{$row->album->name ?? ''}}</td>
  <td>{{$row->author->name ?? 'unknown'}}</td>

  <td>{{$row->created_at}}</td>
  <td>{{$row->updated_at}}</td>
  
  <td><a class="btn btn-sm btn-danger" href="{{route('delete-file', $row->id)}}" role="button">Delete</a></td>
  
</tr>
@endforeach
</tbody>

</table>

