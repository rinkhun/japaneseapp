@extends('layouts.app')

@section('content')
    <p>DASHBOARD</p>
    <a href="{{route('admin.categories.index')}}" class="btn btn-light" role="button" aria-pressed="true">Categories</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-light" role="button" aria-pressed="true">Books</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-light" role="button" aria-pressed="true">Lessons</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-light" role="button" aria-pressed="true">Grammars</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-light" role="button" aria-pressed="true">Grm_examples</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-light" role="button" aria-pressed="true">Vocabularies</a>
@endsection
