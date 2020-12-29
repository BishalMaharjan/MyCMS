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



<div class="d-flex" id="wrapper">
 <div class="container-fluid">
    <div class="row p-5" style="width:100%">
      <div class="container" style = "background-color: #F4F7F9">
        <br>
        <div class="row" style="text-align: center">
          <div class="col-3">
            <a href= "/contents_categories/{{$content->category_id}}" style="color:#BC3F33; text-decoration:underline;"><h5><b>{{$content->categories->category_name}}</h5></b></a>
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
          
         <div class="col-6">
          <h5 style="color:#474A4C;"><strong> {{$content->users->name}}</strong></h5>
        </div>
         
          <div class="col-12" align="middle">
            <p style="color:#C8C8CB;"><img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/256/calendar-clock-icon.png" width="15" height="15"  alt=""> &nbsp;publised date: {{$content->created_at}}&nbsp;|<img src="data:image/png;base64,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" width="15" height="15"> &nbsp;updated date: {{$content->updated_at}}
              &nbsp;|<img src="data:image/png;base64,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" width="15" height="15"> &nbsp;location: {{$content->content_location}}</p>
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
      </div>
    </div>
  </div>
 </div>
</div>
@endsection
