
@extends('layouts.app')

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
    Content
  </div>
  <br>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />@endif
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>ID</td>
          <td>Image</td>
          <td>category Name</td>
          <td>Language</td>
          <td>title</td>
          <td>location</td>
          <td>Content creator name</td>
          
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
      <div class="d-flex" style="display:flex; justify-content:flex-end; width:100%; margin-left:-14px;">
        <a href="/content/create"class="btn btn-success ">Add a new content +</a><i class="fas fa-magic ml-1"></i>
        <a href="/content/index"class="btn btn-primary ">View all contents ></a><i class="fas fa-magic ml-1"></i>
        <br>
      </div>
      <br>
     <br>
        @foreach($content as $contents)
        <tr>
          
            <td>{{$contents->id}}</td>
            <td> <img src="{{ URL::to('/') }}/storage/{{ $contents->content_image }} " width="45" height="45" alt=""></td>
            <td>{{$contents->categories->category_name}}</td>
            <td>{{$contents->languages->language_name}}</td>
            <td>{{$contents->content_title}}</td>
            <td>{{$contents->content_location}}</td>
            <td>{{$contents->Users->name}}</td>
            <td>
              <div class="row">
                <a href="{{ route('contents.edit', $contents->id) }}" class="btn btn-primary  btn-sm">Edit</a>&nbsp;&nbsp;&nbsp;
                <form action="{{ route('contents.destroy', $contents->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>&nbsp;&nbsp;&nbsp;
                <a href="/content_detail_index/{{$contents->id}}" class="btn btn-secondary btn-sm">Preview Post</a>
              </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection