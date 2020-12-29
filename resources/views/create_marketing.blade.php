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
 <a href="{{ route('marketing.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('marketing.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
    <label class="col-md-4 text-right">Enter Name</label>
    <div class="col-md-8">
     <input type="text" name="mt_name" class="form-control input-lg"/>
    </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
    <label class="col-md-4 text-right">Enter phone number</label>
    <div class="col-md-8">
     <input type="number" name="mt_phone" class="form-control input-lg" />
    </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
    <label class="col-md-4 text-right">Enter designation</label>
    <div class="col-md-8">
     <input type="text" name="mt_designation" class="form-control input-lg" />
    </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
    <label class="col-md-4 text-right">Enter Sector of work</label>
    <div class="col-md-8">
     <input type="text" name="mt_sector" class="form-control input-lg" />
    </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
    <label class="col-md-4 text-right">Enter email address</label>
    <div class="col-md-8">
     <input type="email" name="mt_email" class="form-control input-lg" />
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