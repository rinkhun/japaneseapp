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
                <th scope="col">Title</th>
                <th scope="col">Mean</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grammars as $grammar)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $grammar->title }}</td>
                    <td><img src="{{ Storage::url($grammar->mean) }}" class="img-fluid" alt="hi"></td>
                    <td>
                        <div class="row">
                           <form method="POST" action="{{ route('admin.grammars.destroy', ['grammar' => $grammar]) }}">

                                <a href="{{ route('admin.grammars.show', $category->id) }}" title="show">
                                  <i class="fas fa-eye sasm" style="color: black"></i>
                                </a>

                                {{-- <a href="{{ route('admin.grammars.edit', $category->id) }}">
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
