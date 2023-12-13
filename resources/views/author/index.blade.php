@extends('layouts.app')


@section('title')

Admin page

@endsection




@section('content')

<h1>Admin page</h1>


<h2>Author list</h2>

<a class="btn btn-primary mb-2" href="{{ route('author.create') }}" role="button">Create Author</a>


@include('inc.gridview2', [
    'fields' => ['id', 'name'],
    'data' => $models
    ])

@endsection