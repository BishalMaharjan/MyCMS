@extends('layouts.main')
@section('content')
<h1>Create Page</h1>

<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ route('update.user',$user->id) }}" method="POST">

    {{ csrf_field() }}
    @method('PATCH')
    <p class="h4 mb-4">Edit</p>
  <div class="form-group">
    <label for="exampleFormControlSelect1" >Role</label>
    <select class="form-control" id="exampleFormControlSelect1" name="role_id">
    @foreach($roles as $role)
      <option value="{{ $role->id  }}">{{ $role->role_name}}</option>
    @endforeach

    </select>
  </div>


    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Update</button>



</form>
@endsection