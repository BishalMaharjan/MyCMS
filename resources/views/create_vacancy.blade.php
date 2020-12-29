@extends('layouts.main')
@section('content')
<h1>Create Page</h1>

<!-- Default form register -->
<form class="text-center border border-light p-5" action=" {{ route('store.vacancy')}} " method="POST">

    {{ csrf_field() }}
    <p class="h4 mb-4">Create</p>

    <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="vacancy_title">
  </div>
  <div class="form-group">
    <label for="">Position</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="vacancy_position">
  </div>
  <div class="form-group">
    <label for="">Number of Vacancy</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="vacancy_number">
  </div>
  <div class="form-group">
    <label for="">Skill</label>
    <textarea class="form-control" id="summary-ckeditor" name="vacancy_skill"></textarea>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
  </div>
  <div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" name="vacancy_email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Desciption</label>
    <textarea class="form-control" id="summary" name="vacancy_description"></textarea>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary' );
</script>
  </div>
  <div class="form-group">
    <label for="">Status</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="vacancy_status">
  </div>
  <div class="form-group">
    <label for="">Deadline</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="vacancy_deadline">
  </div>



    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Create</button>



</form>
@endsection