@extends('layouts.app')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
    .textarea {
    width: 100%;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Add New Content
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
    
      <form method="POST" action="/contents" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="category_id">category of content</label>
            <select id="category_id" name="category_id" class="form-control">
            <option  value="0">--select category---</option>
            @foreach($category as $categories)
            <option  value="{{$categories->id}}">{{$categories->category_name}}</option>
            @endforeach
            </select>
          </div>
          
          

          <div class="form-group">
            <label for="language_id">language of content</label>
            <select id="language_id" name="language_id" class="form-control">
            <option  value="0">--select language---</option>
            @foreach($language as $languages)
            <option  value="{{$languages->id}}">{{$languages->language_abbreviation}}</option>
            @endforeach
            </select>
          </div> 

          <div class="form-group">
            <label for="content_title">Content title</label>
            <input type="text" class="form-control" name="content_title"/>
          </div>

          <div class="form-group">
          <label for="content_subtitle">Content subtitle</label>
          <input type="text" class="form-control" name="content_subtitle"/>
         </div>

         <div class="form-group">
          <label for="content_description">Content description</label><p style="color:#BB8064">Appropriate image size:(920X470)</p>
          <div>
            <textarea class="form-control" id="description" name="content_description" cols="150" rows="20"></textarea>
          </div>
         </div>
         <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'description' );
        </script>

          <div class="form-group">
            <label for="image">File upload</label>
            <input type="file" name="content_image" class="form-control-file" id="image">
          </div>

          <div class="form-group">
            <label for="content_location">Content location</label>
            <input type="text" class="form-control" name="content_location"/>
           </div>

          <button type="submit" class="btn btn-block btn-danger">Create Content</button>
      </form>
  </div>
</div>
@endsection