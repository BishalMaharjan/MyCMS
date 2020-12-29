@extends('layouts.main')
@section('content')
    <h1>User</h1>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>



    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role_name }}</td>
      <td>

<a href="{{ route('edit.user',$user->id) }}"><i class="fas fa-edit"></i></a>
      || 
      <form method="POST" id="delete-form-{{ $user->id }}" action="{{route('delete.user',$user->id)}}"  style="display: none;" >
{{ csrf_field() }}
{{ method_field('delete') }}
</form>
<button onclick="if (confirm('Are you sure to delete?')) {
event.preventDefault();
document.getElementById('delete-form-{{$user->id}}').submit();
}
else{
event.preventDefault();

}
">
<a href=""><i class="far fa-trash-alt"></i></a>

</button>
</td>


    </tr>
    @endforeach
  </tbody>
</table>
<a  href=" {{ route('create.user') }} "> <button type="button" class="btn btn-primary">Add New</button></a>
@endsection
