<x-layout title="Register">
    <h1>Register</h1>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" name="name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="first_name" class="form-control" id="first_name" name="first_name">
            @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="last_name" class="form-control" id="last_name" name="last_name">
            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="administrator" class="form-label">Administrator</label>
            <input type="administrator" class="form-control" id="administrator" name="administrator">
            @error('administrator')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="expires" class="form-label">Expiry Date</label>
            <input type="expires" class="form-control" id="expires" name="expires">
            @error('expires')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
{{--    allow user to cancel--}}
    <form method="GET" action="{{route('users.index')}}">
            @csrf
            <button type="submit" class="btn btn-primary">Cancel</button>
    </form>
</x-layout>


{{--@extends('layouts.nav')--}}
{{--@section('title','Create User')--}}
{{--@section('content')--}}
{{--    <form method="POST" action="{{route('users.store')}}">--}}
{{--        @csrf--}}
{{--        <p>Name: <input type="text" name="title" value="{{old('title')}}"></p>--}}
{{--        <p>FirstName: <input type="text" name="first_name" value="{{old('first_name')}}"></p>--}}
{{--        <p>LastName: <input type="text" name="last_name" value="{{old('last_name')}}"></p>--}}
{{--        <p>Administrator: <input type="boolean" name="administrator" value="{{old('administrator')}}"></p>--}}
{{--        <p>Expires: <input type="date" name="expires" value="{{old('expires')}}"></p>--}}
{{--        <p>Email: <input type="email" name="email" value="{{old('email')}}"></p>--}}
{{--        <p>Password: <input type="password" class="password" id="password" name="password" value="{{old('email')}}"></p>--}}

{{--        <input type="submit" value="Submit">--}}
{{--    </form>--}}
{{--    <form method="GET" action="{{route('users.index')}}">--}}
{{--        @csrf--}}
{{--        <input type="submit" value="Cancel">--}}
{{--    </form>--}}
{{--@endsection--}}

