@extends('parent')

@section('main')
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="right">
                <a href="{{ route('advertisment.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
     <form method="post" action="{{ route('advertisment.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
      <div class="form-group">
       <label class="col-md-4 text-right">Select Advertisment Image</label>
       <div class="col-md-8">
        <input type="file" name="advertisment_image" />
              <img src="{{ URL::to('/') }}/images/{{ $data->advertisment_image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $data->advertisment_image }}" />
       </div>
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
        <input type="date" name="created_at" value="{{ $data->created_at }}" class="form-control input-lg"/>
       </div>
      </div>
      <br /><br /><br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
      </div>
     </form>

@endsection