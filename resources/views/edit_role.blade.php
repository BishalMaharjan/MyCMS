@extends('layouts.main')
@section('content')
<h1>Create Page</h1>

<!-- Default form register -->
<form class="text-center border border-light p-5" action=" {{ route('update.role',$role->id) }} " method="POST">

    {{ csrf_field() }}
    <p class="h4 mb-4">Create</p>

    <div class="form-group">
    <label for="">Role</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $role->role_name }}" name="role_name">
  </div>




    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Update</button>



</form>
@endsection