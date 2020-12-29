
@extends('layouts.main')

@section('content')

Welcome
{{ Auth::user()->name }}


@endsection