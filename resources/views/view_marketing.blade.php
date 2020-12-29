@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('marketing.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 <h3>MarketingTeam_Name - {{ $data->mt_name }} </h3>
 <h3>MarketingTeam_phone - {{ $data->mt_phone }} </h3>
 <h3>MarketingTeam_designation - {{ $data->mt_designation }} </h3>
 <h3>MarketingTeam_sector - {{ $data->mt_sector }} </h3>
 <h3>MarketingTeam_email - {{ $data->mt_email }}</h3>
</div>
@endsection