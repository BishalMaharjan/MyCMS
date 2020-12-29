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
      <div class="container-fluid" align="middle">
        <div class="row p-5" style="width:90%">
          <table class="table">
            <thead>
                <tr style="background-color: #DCE3E7; color:#626E76;">
                  <td><h4 style="text-align: center">Bookmarks</h4></td>
                </tr>
            </thead>
            <tbody>
                @foreach($bookmark as $bookmarks)
                <tr>
                  <td>
                  <div class="row">
                    <div class="col-10">
                       <h5><a style="color:#243643;" href="/content_detail/{{$bookmarks->content_id}}">{{$bookmarks->Contents->content_title}}</h5></a>
                    </div>
                      <div class="col-2">
                        <form action="{{ route('bookmark.destroy', $bookmarks->id)}}" method="post" style="display: inline-block">
                              @csrf
                              @method('DELETE')
                              <input type="image" src="https://cdn4.iconfinder.com/data/icons/materia-flat-arrows-symbols-vol-7/24/018_311_insignia_cross_emblem-512.png" alt="Submit" width="20" height="20">
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <div class="bg-light border-right" id="sidebar-wrapper" style="width:20%">
      <div class="sidebar-heading" style="text-align: center; background-color: #E3EAEE;"><br> <h3 style="color:#AE6464; "> Read other latest news </h3> <br></div>
        <div class="list-group list-group-flush">
          @foreach ($AllContent as $contents)
          <a href="/content_detail/{{$contents->id}}">
          <div class="sidebar-heading" style="text-align: center; background-color: #E3EAEE;"><img src="{{ URL::to('/') }}/storage/{{ $contents->content_image }} " height="300" width="350" alt=""></div>
          </a>
          <div class="sidebar-heading" style="text-align: center; background-color: #E3EAEE;"><h6><br><b>{{ $contents->content_title }}</h6></b><br></div>
          @endforeach
        </div>
      </div>
</div>
@include('footer')
@endsection
