@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.books.update',$book->id) }}" method='POST'enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
        placeholder=""value="{{$book->name}}">
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
