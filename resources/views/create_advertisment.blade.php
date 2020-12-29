@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('advertisment.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('advertisment.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
    <label class="col-md-4 text-right">Upload Advertisment Image</label>
    <div class="col-md-8">
     <input type="file" name="advertisment_image" />
    </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
    <label class="col-md-4 text-right" for="category_id">Select category_id for advertisment</label>
    <div class="col-md-8">
     <select id="category_id" name="category_id" >
      <option  value="0">--select category---</option>
      @foreach($category as $categories)
          <option value="{{$categories->id}}">{{$categories->category_name}}</option>
      @endforeach
    </select>
    </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
    <label class="col-md-4 text-right">Enter published date of advertisment</label>
    <div class="col-md-8">
     <input type="date" name="created_at" class="form-control input-lg" />
    </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group text-center">
    <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
 </div>

</form>

@endsection