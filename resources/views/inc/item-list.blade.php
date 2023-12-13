
<table class="table table-striped table-hover table-bordered table-sm">

<thead>
  <tr>
    <th>title</th>
    
    <th>size</th>
    <th>time</th>
    <th>album_id</th>
    <th>author_id</th>

    <th></th>    
  </tr>
</thead>

<tbody>



@foreach($files as $row)
<tr>
  <td>{{$row->title}}</td>
  
  <td>{{$row->size}}</td>
  <td>{{$row->time}}</td>
  <td>{{$row->album->name ?? ''}}</td>
  <td>{{$row->author->name ?? ''}}</td>
  
  <td>
    <div class="example">
      <audio crossorigin src="download/{{$row->hash}}.mp3"></audio>
    </div>
  </td>
  
</tr>
@endforeach
</tbody>

</table>
