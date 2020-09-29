@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Tài Khoản Email:</label>
            <input name="email" type="email" class="form-control" placeholder="Enter email" id="email">
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="pwd">Mật Khẩu:</label>
            <input name="password" type="password" class="form-control" placeholder="Ít nhất 8 ký tự" id="pwd">
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
            </label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
    </form>
@endsection
