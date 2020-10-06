@extends('layouts.app')

@section('content')
@error('logout')
<p>{{$message}}</p>
@enderror
    <h1>Hello World</h1>
@endsection
