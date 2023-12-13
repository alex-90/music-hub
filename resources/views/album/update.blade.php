@extends('layouts.app')


@section('title')

Update Album

@endsection



@section('content')

<h1>Update Album</h1>

@include('album._form-update', ['authors' => $authors])

@endsection