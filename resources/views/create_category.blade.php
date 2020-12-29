@extends('layouts.app')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Add New Category
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="POST" action="/categories" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Category Name</label>
              <input type="text" class="form-control" name="category_name"/>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="category_status" class="form-control">
              <option  value="1">Active</option>
              <option  value="0">In Active</option>
            </select>
          </div>
          <div class="form-group">
            <label for="image">File upload</label>
            <input type="file" name="category_image" class="form-control-file" id="image">
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create Category</button>
      </form>
  </div>
</div>
@endsection
