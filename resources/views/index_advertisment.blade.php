@extends('parent')

@section('main')

<div align="right">
  <a href="{{ route('advertisment.create') }}" class="btn btn-success btn-sm">Add</a>
</div>

<table class="table table-bordered table-striped">
 <tr>
  <th width="35%">Advertisment_image</th>
  <th width="30%">category_id</th>
  <th width="30%">Published_at</th>
  <th width="30%">Action</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->advertisment_image }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->category_id }}</td>
   <td>{{ $row->created_at }}</td>
   <td>

    <form action="{{ route('advertisment.destroy', $row->id) }}" method="post">
          <a href="{{ route('advertisment.view', $row->id) }}" class="btn btn-primary">Show</a>
          <a href="{{ route('advertisment.edit', $row->id) }}" class="btn btn-warning">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
    </form>

   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection