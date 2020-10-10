@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.categories.update',$category->id) }}" method='POST'enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
        placeholder=""value="{{$category->name}}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Icon</label>
            <input type="file" name="icon" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        @error('icon')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
