@extends('layouts.app')

@section('content')
<p>{{$category->name}}</p>
<img src="{{ Storage::url($category->icon) }}" width="500px" height="auto">
@endsection
