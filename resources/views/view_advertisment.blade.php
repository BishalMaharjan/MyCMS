@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('advertisment.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 <img src="{{ URL::to('/') }}/images/{{ $data->advertisment_image }}" class="img-thumbnail" height="511" width="511" />
 <h3>Category_id for advertisment - {{ $data->category_id }} </h3>
 <h3>Published date of advertisment - {{ $data->created_at }}</h3>
 <h
</div>
@endsection