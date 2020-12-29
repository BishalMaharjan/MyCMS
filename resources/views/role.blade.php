@extends('layouts.main')
@section('content')
    <h1>Role</h1>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($roles as $role)
    <tr>
      <th scope="row">{{ $role->id }}</th>
      <td>{{ $role->role_name }}</td>
      <td>

      <a href="{{ route('edit.role',$role->id) }}"><i class="fas fa-edit"></i></a>
            || 
            <form method="POST" id="delete-form-{{ $role->id }}" action="{{route('delete.role',$role->id)}}"  style="display: none;" >
      {{ csrf_field() }}
      {{ method_field('delete') }}
 </form>
 <button onclick="if (confirm('Are you sure to delete?')) {
   event.preventDefault();
   document.getElementById('delete-form-{{$role->id}}').submit();
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
<a  href=" {{ route('create.role') }} "> <button type="button" class="btn btn-primary">Add New</button></a>
@endsection
