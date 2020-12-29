@extends('layouts.main')
@section('content')
    <h1>Vacancy</h1>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Postion</th>
      <th scope="col">Number</th>
      <th scope="col">email</th>
      <th scope="col">status</th> 
      
      <th scope="col">Action</th>  
      

    </tr>
  </thead>
  <tbody>
  @foreach($vacancies as $vacancy)
    <tr>
      <th scope="row">{{ $vacancy->id }}</th>
      <td>{{ $vacancy->vacancy_title }}</td>
      <td>{{ $vacancy->vacancy_position }}</td>
      <td>{{ $vacancy->vacancy_number }}</td>
      <td>{{ $vacancy->vacancy_email }}</td>
      <td>{{ $vacancy->vacancy_status }}</td>
     
      <td>
      <a href="{{ route('show.vacancy',$vacancy->id)  }}"><i class="fa fa-info btn btn-info"></i></a>
      ||
      <a href="{{ route('edit.vacancy',$vacancy->id) }}"><i class="fas fa-edit btn btn-primary"></i></a>
            || 
            <form method="POST" id="delete-form-{{ $vacancy->id }}" action="{{route('delete.vacancy',$vacancy->id)}}"  style="display: none;" >
      {{ csrf_field() }}
      {{ method_field('delete') }}
 </form>
 <button onclick="if (confirm('Are you sure to delete?')) {
   event.preventDefault();
   document.getElementById('delete-form-{{$vacancy->id}}').submit();
 }
 else{
  event.preventDefault();

 }
 ">
      <a href=""><i class="far fa-trash-alt btn btn-danger"></i></a>

 </button>
      </td>


    </tr>
    @endforeach
  </tbody>
</table>
<a  href=" {{ route('create.vacancy') }} "> <button type="button" class="btn btn-primary">Add New</button></a>
@endsection
