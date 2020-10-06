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
    <h3>Lessons Manage</h3>
    <a href="{{ route('admin.lessons.create') }}" class="btn btn-secondary" role="button">Add Lesson</a>
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
                <th scope="col">Name</th>
                <th scope="col">Img</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lessons as $lesson)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $lesson->name }}</td>
                    <td><img src="{{ Storage::url($lesson->img) }}" class="img-fluid" alt="hi"></td>
                    <td>
                        <div class="row">
                           <form method="POST" action="{{ route('admin.lessons.destroy', ['lesson' => $lesson]) }}">

                                <a href="{{ route('admin.lessons.show', $lesson->id) }}" title="show">
                                  <i class="fas fa-eye sasm" style="color: black"></i>
                                </a>

                                {{-- <a href="{{ route('admin.lessons.edit', $$book->id) }}">
                                  <i class="fas fa-edit sasm" style="color: black"></i>
                                </a> --}}

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
