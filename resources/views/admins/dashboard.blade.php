@extends('layouts.app')

@section('content')
    <p>DASHBOARD</p>
    <a href="{{route('admin.categories.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Categories</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Books</a>
    <a href="{{route('admin.lessons.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Lessons</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Grammars</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Grm_examples</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Vcb_examples</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Kanjis</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Knj_examples</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Conversations</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Exercices</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Questions</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Histories</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Users</a>
    <a href="{{route('admin.books.index')}}" class="btn btn-dark" role="button" aria-pressed="true">Salers</a>
@endsection
