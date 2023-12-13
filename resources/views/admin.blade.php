@extends('layouts.app')


@section('title')

Admin page

@endsection




@section('content')

<h1>Admin page</h1>


<h2>Files list</h2>

<a class="btn btn-primary mb-2" href="{{ route('upload') }}" role="button">Upload File</a>


@include('inc.gridview', ['files' => $files])

@endsection