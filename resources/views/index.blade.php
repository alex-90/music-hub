@extends('layouts.my')


@section('title')

Index page

@endsection




@section('content')

<h1>Index page</h1>


<h2>Item list</h2>


@include('inc.item-list', ['files' => $files])

@endsection