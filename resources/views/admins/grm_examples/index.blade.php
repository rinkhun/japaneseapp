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
    <h3>Grm_examples Manage</h3>
    <a href="{{ route('admin.grammars.create') }}" class="btn btn-secondary" role="button">Add Grm_examples</a>
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
                <th scope="col">Grammar</th>
                <th scope="col">Japanese</th>
                <th scope="col">vietnamese</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grm_examples as $grm_example)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $grm_example->grammar->title}}</td>
                    <td>{{ $grm_example->japanese }}</td>                   
                    <td>{{ $grm_example->vietnamese }}</td>
                    <td>
                        <div class="row">
                           <form method="POST" action="{{ route('admin.grm_examples.destroy', ['grm_example' => $grm_example]) }}">

                                <a href="{{ route('admin.grm_examples.show', $grm_example->id) }}" title="show">
                                  <i class="fas fa-eye sasm" style="color: black"></i>
                                </a>

                                <a href="{{ route('admin.grm_examples.edit', $grm_example->id) }}">
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
