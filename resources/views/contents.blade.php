
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
  .center{
    text-align: center;
  }
</style>
<div class="card push-top">
  <div class="card-header" style="text-align:center">
    AUXFIN NEWS PORTAL
  </div>
  <br>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />@endif
    
      <br>
     <br>

     <div style="text-align: center">
        <div class="row p-5">
        @foreach($content as $contents)
              <div class="col-4 pb-4">
                <a href="/content_detail/{{$contents->id}}">
                  <img src="{{ URL::to('/') }}/storage/{{ $contents->content_image }} " class="w-70" alt="">
                </a>
              <div class="center">
                <h3>{{$contents->content_title}}</h3>
                <p>By {{$contents->Users->name}}</p>
                <h4>{{$contents->content_subtitle}}</h4>
              </div>
            </div>
     @endforeach
    <div>
</div>

@endsection
