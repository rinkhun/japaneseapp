<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/fontawesome-free-5.15.0-web/css/all.css') }}">
    <style>
        body {
            font-family: 'Nunito';
        }

        .dashboard__title {
            text-align: center;
        }

        .dashboard__button {
            text-align: center;
        }

        .dashboard__button a {
            margin:10px;

        }

    </style>
    @yield('css')
</head>

<body>
    {{-- mennu --}}
    @include('layouts.menu')
    @auth('admins')
    <h3 class="dashboard__title">Danh sách quản lý các mục</h3>
    <div class="dashboard__button">
        <a href="{{route('admin.categories.index')}}" class="btn btn-info" role="button" aria-pressed="true">Categories</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Books</a>
        <a href="{{route('admin.lessons.index')}}" class="btn btn-info" role="button" aria-pressed="true">Lessons</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Grammars</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Grm_examples</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Vcb_examples</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Kanjis</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Knj_examples</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Conversations</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Exercices</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Questions</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Histories</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Users</a>
        <a href="{{route('admin.books.index')}}" class="btn btn-info" role="button" aria-pressed="true">Salers</a>
    </div>
    @endauth
    {{--Body --}}
    <div class="container">
        @yield('content')
    </div>


    {{-- footer --}}
</body>

</html>
