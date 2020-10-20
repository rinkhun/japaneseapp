@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.lessons.store') }}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Book</label>
            <select name="book_id" class="form-control">
                @foreach ($lessons as $lesson)
                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                @endforeach
            </select>
        </div>
        @error('book_id')
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

        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="">
            </textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
