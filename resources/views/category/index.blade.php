@extends('layouts.app')


@section('title')

Admin page

@endsection




@section('content')

<h1>Admin page</h1>


<h2>Category list</h2>

<a class="btn btn-primary mb-2" href="{{ route('category.create') }}" role="button">Create Category</a>


@include('inc.gridview3', [
    'fields' => ['id', 'name', 'parent_id'],
    'name' => 'category',
    'data' => $models
    ])

@endsection