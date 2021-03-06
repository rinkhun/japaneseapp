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
            <p style="color:green"> {{ session('success') }}</p>
        @endif
        @if (session('fail'))
            <p style="color:red">{{ session('fail') }}</p>
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
                    <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                    <td>{{ $category->name }}</td>
                    <td><img src="{{ Storage::url($category->icon) }}" class="img-fluid" alt="hi"></td>
                    <td>
                        <div class="row">
                           <form method="POST" action="{{ route('admin.categories.destroy', ['category' => $category]) }}">

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
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <p>Categories not found</p>
            @endforelse
        </tbody>
    </table>


    {{ $categories->links("pagination::bootstrap-4") }}
@endsection
