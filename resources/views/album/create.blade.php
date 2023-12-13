@extends('layouts.app')


@section('title')

Create Album

@endsection



@section('content')

<h1>Create Album</h1>

@include('album._form-create', ['authors' => $authors])

@endsection