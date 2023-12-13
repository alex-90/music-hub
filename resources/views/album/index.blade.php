@extends('layouts.app')


@section('title')

Admin page

@endsection




@section('content')

<h1>Admin page</h1>


<h2>Album list</h2>

<a class="btn btn-primary mb-2" href="{{ route('album.create') }}" role="button">Create Album</a>


@include('inc.gridview3', [
    'fields' => ['id', 'name', 'author_id'],
    'name' => 'album',
    'data' => $models
    ])

@endsection