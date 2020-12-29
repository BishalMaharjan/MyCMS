@extends('layouts.main')
@section('content')
<h1>Create Page</h1>

<!-- Default form register -->
<form class="text-center border border-light p-5" action=" {{ route('store.user') }} " method="POST">

    {{ csrf_field() }}
    <p class="h4 mb-4">Create</p>

    <div class="form-group">
    <label for="">Username</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="username">
  </div>
  <div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1" >Role</label>
    <select class="form-control" id="exampleFormControlSelect1" name="role_id">
    @foreach($roles as $role)
      <option value="{{ $role->id  }}">{{ $role->role_name}}</option>
    @endforeach

    </select>
  </div>


    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Create</button>



</form>
@endsection