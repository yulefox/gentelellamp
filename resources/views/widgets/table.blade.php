@if (!empty($data))
<table id=@if (isset($id)) {{$id}} @else "datatable" @endif class="table table-striped table-bordered">
  <thead>
    <tr>
      @foreach ($fields as $field)
      <th>{{ $field }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $obj)
    <tr>
      @foreach ($fields as $key => $field)
      <td>{{ $obj->$key }}</td>
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
@else
@endif
