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
    <h3>Categories Manage</h3>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary" role="button">Add Category</a>
    <table class="table">
        <br>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Icon</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $category->name }}</td>
                    <td><img src="{{ Storage::url($category->icon) }}" class="img-fluid" alt="hi"></td>
                    <td>
                        <div class="row">
                            <a href="{{ route('admin.categories.show', $category->id) }}" title="show">
                                <i class="fas fa-eye sasm" style="color: black"></i>
                              </a>

                            {{-- <form method="POST" action="{{ route('admin.categories.destroy', ['category' => $category]) }}">

                                <a href="{{ route('admin.categories.show', $category->id) }}" title="show">
                                  <i class="fas fa-eye sasm" style="color: black"></i>
                                </a>

                                <a href="{{ route('admin.categories.edit', $category->id) }}">
                                  <i class="fas fa-edit sasm" style="color: black"></i>
                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form> --}} 
                        </div>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
@endsection
