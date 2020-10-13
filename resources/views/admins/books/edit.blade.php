@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.books.store') }}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->id == $book->category_id ? 'selected' : '' }}</option>
                @endforeach
            </select>
        </div>
        @error('categoty_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">

            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Img</label>
            <input type="file" name="img" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        @error('img')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
