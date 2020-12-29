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

@include('header')


<div class="d-flex" id="wrapper">
  <div class="border-right" id="sidebar-wrapper" style="width:26%; background-color: #DCE3E7;">
    <div class="sidebar-heading" style="text-align: center; background-color: #DCE3E7;"><br> <h3  style="color:#959CA0;"> Categories </h3><br>  </div>
    <div class="list-group list-group-flush">
      @foreach($category as $categories)
      <a href="/contents/{{$categories->id}}" class="list-group-item list-group-item-action" style="background-color: #FCFCFC"><img src="{{ URL::to('/') }}/storage/{{ $categories->category_image }} " width="45" height="45" style="border-radius:50%" alt="">&nbsp;&nbsp;&nbsp;<h7><strong style="color:#243643;">{{$categories->category_name}}</strong></h7></a>
      @endforeach
     
      <div class="sidebar-heading" style="text-align: center; background-color: #DCE3E7;"><br><h5  style="color:#959CA0;"> Contact Us </h5> </div>
      <a href="/contents/{{$categories->id}}" class="list-group-item list-group-item-action" style="background-color: #FCFCFC"><img src="https://www.shareicon.net/data/128x128/2015/12/26/693224_man_512x512.png" width="45" height="45" style="border-radius:50%" alt="">&nbsp;&nbsp;&nbsp;<h7><strong style="color:#243643;">Vacancy</strong></h7></a>
      <a href="/contents/{{$categories->id}}" class="list-group-item list-group-item-action" style="background-color: #FCFCFC"><img src="https://image.flaticon.com/icons/svg/2471/2471861.svg" width="45" height="45" style="border-radius:50%" alt="">&nbsp;&nbsp;&nbsp;<h7><strong style="color:#243643;">Marketing Team</strong></h7></a>
    </div>
 </div>
 <div class="container-fluid">
    <div class="row p-5" style="width:100%">
      <div class="container" style = "background-color: #F4F7F9">
        <br>
        <div class="row" style="text-align: center">
          <div class="col-3">
            <a href= "/contents/{{$content->category_id}}" style="color:#BC3F33; text-decoration:underline;"><h5><b>{{$content->categories->category_name}}</h5></b></a>
          </div>
          <br><br>
          <div class="col-12">
            <h1 style="color:#313964"><b>{{$content->content_title}}</b></h1>
            <h5 style="color:#94959C">{{$content->content_subtitle}}</h5>
          </div>
        </div>
        <hr>
        <br>
          <div class="row">
              <div class="col-12" align="middle">
                <img src="{{ URL::to('/') }}/storage/{{ $content->content_image }} " width="900" height="500"  alt="">
                <br><br>
              </div>
          </div>
          
          @auth
          <form method="POST" action="{{ route('bookmark.store')}}" enctype="multipart/form-data">
            @csrf
          <div align="right">
            <input type="hidden" value={{$content->id}} name="content_id">
            <input type="image" src="https://cdn4.iconfinder.com/data/icons/web-ui-ux/32/072-Bookmark-512.png" alt="Submit" width="40" height="40">
          </div>
         </form>
         @endauth
         <div class="col-6">
          <h5 style="color:#474A4C;"><strong> {{$content->users->name}}</strong></h5>
        </div>
         
          <div class="col-12" align="middle">
            <p style="color:#C8C8CB;"><img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/256/calendar-clock-icon.png" width="15" height="15"  alt=""> &nbsp;publised date: {{$content->created_at}}&nbsp;|&nbsp;<img src="https://i.pinimg.com/originals/d2/f2/25/d2f225a6ad6b79e32762b172585d7e04.png" width="15" height="15"  alt=""> &nbsp;updated date: {{$content->updated_at}}
              &nbsp;|<img src="https://cdn.iconscout.com/icon/free/png-256/location-62-93995.png" width="15" height="15"> &nbsp;location: {{$content->content_location}}</p>
          </div>
          <hr>
         
          <div class="row">
            <div class="col-12">
              <p  id="editor2" onfocus="this.value='';" style="letter-spacing: 3px; color:#5A5B61;">{!!$content->content_description!!}</p>
            </div>
          </div>
          
          <script type="text/javascript">  
            CKEDITOR.replace( 'editor1', { 
            enterMode: CKEDITOR.ENTER_BR, 
            on: {'instanceReady': function (evt) { evt.editor.execCommand('');}},
            }); 
        </script>
          <hr>
          <div class="row">
            <div class="col-6">
              <p style="color:#29367F;">Written by: {{$content->users->name}}</p>
            </div>
          </div>
          <hr>
          <h4 style="color:#AE6464;"><b>Related Contents</b></h4><br>
          <div class="row">
              @foreach ($CategoryContents as $Contents)
              <div class="col-1">
              <img src="{{ URL::to('/') }}/storage/{{ $Contents->content_image }} " height="50" width="50" alt="" style="border-radius:50%">
              </div>
              <div class="col-11">
              <a href ="/content_detail/{{$Contents->id}}">&nbsp;&nbsp;<h5 style="color:#212F3C;">{{$Contents->content_title}}</h5></a>
              </div>
              @endforeach
              <hr>
          </div>
      </div>
    </div>
  </div>

  <div class="bg-light border-right" id="sidebar-wrapper" style="width:20%">
    <div class="sidebar-heading" style="text-align: center; background-color: #E3EAEE;"><br> <h3 style="color:#AE6464; "> Read other latest news</h3><br></div>
      <div class="list-group list-group-flush">
        @foreach ($AllContent as $contents)
        <a href="/content_detail/{{$contents->id}}">
        <div class="sidebar-heading" style="text-align: center; background-color: #E3EAEE;"><img src="{{ URL::to('/') }}/storage/{{ $contents->content_image }} " height="300" width="320" alt=""></div>
        </a>
        <div class="sidebar-heading" style="text-align: center; background-color: #E3EAEE;"><h6><br><b>{{ $contents->content_title }}</h6></b><br></div>
        @endforeach
      </div>
    </div>
 </div>
 @include('footer')
@endsection
