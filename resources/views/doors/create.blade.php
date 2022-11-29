<x-layout title="Register">
    <h1>Register</h1>
    <form action="{{route('doors.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" name="name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
{{--    allow user to cancel--}}
    <form method="GET" action="{{route('doors.index')}}">
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

