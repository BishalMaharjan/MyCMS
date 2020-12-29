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
    Edit & Update
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
    
      <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}"/>
          </div>
        <?php $selectedStatus =  $category->category_status?>
          <div class="form-group">
              <label for="status">Status</label>
              <select id="status" name="category_status" class="form-control">
                  <option  value="0" {{ ($selectedStatus ==  0) ? "selected" : ""  }}>Deactivate</option>
                  <option  value="1" {{ ($selectedStatus ==  1) ? "selected" : ""  }}>Activate</option>
              </select>
          </div>

          <div class="form-group">
            <img src="{{ URL::to('/') }}/storage/{{ $category->category_image }} " width="80" height="80" alt="No Image">
            <br><br>
            <label for="image">File upload</label>
            <input type="file" name="category_image" value="{{ $category->category_image }}" class="form-control-file" id="image">
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection
