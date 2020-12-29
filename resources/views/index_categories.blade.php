

@extends('layouts.main')


@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
  .button{
    margin-left: 50px;
    float: right;
    width: 100%;
    padding: 0.5em;
    font-size: 1.6rem;
  }
</style>
<div class="card push-top">
  <div class="card-header">
    Categories
  </div>
  <br>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>ID</td>
          <td>Image</td>
          <td>Name</td>
          <td>Status</td>
          <td>&nbsp;&nbsp;Action</td>
        </tr>
    </thead>
    <tbody>
      <div class="d-flex" style="display:flex; justify-content:flex-end; width:100%; margin-left:-14px;">
        <a href="create"class="btn btn-success ">Add a new category +</a><i class="fas fa-magic ml-1"></i>
        <a href="/content/index"class="btn btn-primary ">View all contents ></a><i class="fas fa-magic ml-1"></i>
        <br>
      </div>
      <br>
     <br>
        @foreach($category as $categories)
        <tr>
            <td>{{$categories->id}}</td>
            <td> <img src="{{ URL::to('/') }}/storage/{{ $categories->category_image }} " width="45" height="45" alt=""></td>
            <td>{{$categories->category_name}}</td>
            @if ($categories->category_status == 0 )
            <td>Inactive</td>
            @endif
            @if ($categories->category_status == 1 )
            <td>Active</td>
            @endif
            <td>
              <div class="row" style="text-align: center;">
                <div class="col-2" >
                <a href="{{ route('categories.edit', $categories->id) }}" class="btn btn-primary  btn-sm">Edit</a>
                </div>
                <div class="col-2">
                <form action="{{ route('categories.destroy', $categories->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
              </div>
              <div class="col-2">
                <a href="/contents_categories/{{$categories->id}}" class="btn btn-secondary  btn-sm">Category contents</a>
              </div>
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection