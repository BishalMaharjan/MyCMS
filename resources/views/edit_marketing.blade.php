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
                <a href="{{ route('marketing.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
     <form method="post" action="{{ route('marketing.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
      <div class="form-group">
       <label class="col-md-4 text-right">Enter Name</label>
        <div class="col-md-8">
         <input type="text" name="mt_name" value="{{ $data->mt_name }}" class="form-control input-lg"/>
        </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Enter phone number</label>
        <div class="col-md-8">
         <input type="number" name="mt_phone" value="{{ $data->mt_phone }}" class="form-control input-lg" />
        </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Enter designation</label>
        <div class="col-md-8">
         <input type="text" name="mt_designation" value="{{ $data->mt_designation }}" class="form-control input-lg" />
        </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Enter Sector of work</label>
       <div class="col-md-8">
        <input type="text" name="mt_sector" value="{{ $data->mt_sector }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Enter email address</label>
       <div class="col-md-8">
        <input type="text" name="mt_email" value="{{ $data->mt_email }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
      </div>
     </form>

@endsection