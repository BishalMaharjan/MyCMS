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
    Edit & Update Content
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
    
      <form method="post" action="{{ route('contents.update', $content->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <?php $selectedCategory = $content->category_id?>
        <div class="form-group">
          <label for="category_id">category of content</label>
          <select id="category_id" name="category_id" class="form-control">
          @foreach($category as $category)
          <option value="{{$category->id}}"  {{ ($selectedCategory ==  $category->id) ? "selected" : ""  }}>{{$category->category_name}}</option>
          @endforeach
          </select>
        </div>
        <?php $selectedLanguage = $content->language_id ?>
        <div class="form-group">
          <label for="language_id">language of content</label>
          <select id="language_id" name="language_id" class="form-control">
          @foreach($language as $language)
          <option value="{{$language->id}}" {{ $selectedLanguage ==  $language->id ? "selected" : ""  }}>{{$language->language_abbreviation}}</option>
          @endforeach
          </select>
        </div> 
        
        <div class="form-group">
          <label for="content_title">Content title</label>
          <input type="text" class="form-control" name="content_title" value="{{$content->content_title}}"/>
        </div>

         
        <div class="form-group">
          <label for="content_subtitle">Content subtitle</label>
          <input type="text" class="form-control" name="content_subtitle" value="{{$content->content_subtitle}}"/>
         </div>
         
         <div class="form-group">
          <label for="content_description">Content description</label><p style="color:#BB8064">Appropriate image size:(920X470)</p>
          <div>
            <textarea class="form-control" name="content_description" id="description" cols="150" rows="20">{{$content->content_description}}</textarea>
          </div>
         </div>
         <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
         <script>
             CKEDITOR.replace( 'description' );
         </script>

          <div class="form-group">
            <label for="content_location">Content location</label>
            <input type="text" class="form-control" name="content_location" value="{{$content->content_location}}"/>
           </div>

          <div class="form-group">
            <img src="{{ URL::to('/') }}/storage/{{ $content->content_image }} " width="80" height="80" alt="No Image">
            <br><br>
            <label for="image">File upload</label>
            <input type="file" name="content_image" value="{{ $content->content_image }}" class="form-control-file" id="image">
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection