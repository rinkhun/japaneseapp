@extends('layouts.app')
@section('css')
    <style>
        .img-fluid {
            width: 50px;
            height: 50px;
        }

    </style>
@endsection
@section('content')
    <h3>Grammars Manage</h3>
    <a href="{{ route('admin.grammars.create') }}" class="btn btn-secondary" role="button">Add Grammar</a>
    <table class="table">
        <br>
        @if (session('success'))
            <p style="color:green"> {{ session('success') }}</p>
        @endif
        @if (session('fail'))
            <p style="color:red">{{ session('fail') }}</p>
        @endif
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Image</th>
                <th scope="col">Book</th>
                <th scope="col">Lesson</th>
                <th scope="col">Title</th>
                <th scope="col">Mean</th>
                <th scope="col">Using</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grammars as $grammar)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td><img src="{{ Storage::url( $grammar->lesson->book->category->icon) }}" class="img-fluid" alt="không tồn tại"></td>
                    <td>{{$grammar->lesson->book->name}}</td>
                     <td>{{$grammar->lesson->name}}</td>
                    <td>{{ $grammar->title }}</td>
                    <td>{{ $grammar->mean }}</td>
                    <td>{{ $grammar->using }}</td>
                    <td>
                        <div class="row">
                           <form method="POST" action="{{ route('admin.grammars.destroy', ['grammar' => $grammar]) }}">

                                <a href="{{ route('admin.grammars.show', $grammar->id) }}" title="show">
                                  <i class="fas fa-eye sasm" style="color: black"></i>
                                </a>

                                <a href="{{ route('admin.grammars.edit', $grammar->id) }}">
                                  <i class="fas fa-edit sasm" style="color: black"></i>
                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
@endsection
