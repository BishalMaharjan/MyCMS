@extends('parent')

@section('main')

<div align ="right">
  <a href="{{ route('marketing.create') }}" class="btn btn-success btn-sm">Add</a>
</div>

<table class="table table-bordered table-striped">
 <tr>
  <th width="15%">MarketingTeam_Name</th>
  <th width="15%">MarketingTeam_phone</th>
  <th width="20%">MarketingTeam_designation</th>
  <th width="15%">MarketingTeam_sector</th>
  <th width="20%">MarketingTeam_email</th>
  <th width="35%">Action</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->mt_name }}</td>
   <td>{{ $row->mt_phone }}</td>
   <td>{{ $row->mt_designation }}</td>
   <td>{{ $row->mt_sector }}</td>
   <td>{{ $row->mt_email }}</td>
   <td>

    <form action="{{ route('marketing.destroy', $row->id) }}" method="post">
          <a href="{{ route('marketing.view', $row->id) }}" class="btn btn-primary">Show</a>
          <a href="{{ route('marketing.edit', $row->id) }}" class="btn btn-warning">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
    </form>

   </td>
  </tr>
 @endforeach
</table>

@endsection