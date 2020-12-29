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
  body {
  overflow-x: hidden;
}
</style>

@include('header')


<div class="d-flex" id="wrapper">
  <div class="border-right" id="sidebar-wrapper" style="width:26%; background-color: #DCE3E7;">
    <div class="sidebar-heading" style="text-align: center; background-color: #DCE3E7;"><br> <h3  style="color:#959CA0;"> Categories </h3><br>  </div>
    <div class="list-group list-group-flush">
      
      @foreach($category as $categories)
     
      <a href="/contents/{{$categories->id}}" class="list-group-item list-group-item-action" style="background-color: #FCFCFC"><img src="{{ URL::to('/') }}/storage/{{ $categories->category_image }} " width="45" height="45" style="border-radius:50%" alt="">&nbsp;&nbsp;&nbsp;<h7><strong style="color:#243643;">{{$categories->category_name}}</strong></h7></a>
     
     
      <div class="sidebar-heading" style="text-align: center; background-color: #DCE3E7;"><br><h5  style="color:#959CA0;"> Contact Us </h5> </div>
      <a href="/contents/{{$categories->id}}" class="list-group-item list-group-item-action" style="background-color: #FCFCFC"><img src="https://www.shareicon.net/data/128x128/2015/12/26/693224_man_512x512.png" width="45" height="45" style="border-radius:50%" alt="">&nbsp;&nbsp;&nbsp;<h7><strong style="color:#243643;">Vacancy</strong></h7></a>
      <a href="/contents/{{$categories->id}}" class="list-group-item list-group-item-action" style="background-color: #FCFCFC"><img src="https://image.flaticon.com/icons/svg/2471/2471861.svg" width="45" height="45" style="border-radius:50%" alt="">&nbsp;&nbsp;&nbsp;<h7><strong style="color:#243643;">Marketing Team</strong></h7></a>
    </div> 
    @endforeach
 </div>
  
  <div class="container-fluid">
    <div class="row p-5" style="width:100%">
      @foreach($content as $contents)
            <div class="col-4 pb-4">
              <a href="/contents/{{$contents->category_id}}" style="color:#BC3F33; text-decoration:underline;">{{$contents->Categories->category_name}}</a>
              <a href="/content_detail/{{$contents->id}}">
                <img src="{{ URL::to('/') }}/storage/{{ $contents->content_image }} " height="300" width="350" alt="">
              </a>
            <div class="center">
              <h3 style="color:#212852">{{$contents->content_title}}</h3>
              <p style="color:#AFA8AA">By {{$contents->Users->name}}</p>
              <h5 style="color:#535664">{{$contents->content_subtitle}}</h5>
            </div>
            <a href="/content_detail/{{$contents->id}}">
              <h5 style="color:#AE6464">Read more >></h5>
            </a>
          </div>
      @endforeach
    </div>
  </div>
</div>
@include('footer')
@endsection