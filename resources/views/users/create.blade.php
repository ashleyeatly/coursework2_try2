@extends('layouts.nav')
@section('title','Create User')
@section('content')
    <form method="POST" action="{{route('user.store')}}">
        @csrf
        <p>Name: <input type="text" name="title" value="{{old('title')}}"></p>
        <p>FirstName: <input type="text" name="first_name" value="{{old('first_name')}}"></p>
        <p>LastName: <input type="text" name="last_name" value="{{old('last_name')}}"></p>
        <p>Administrator: <input type="boolean" name="administrator" value="{{old('administrator')}}"></p>
        <p>Expires: <input type="date" name="expires" value="{{old('expires')}}</p>
        <p>Email: <input type   ..
        <input type="submit" value="Submit">
    </form>
    <form method="GET" action="{{route('users.index')}}">
        @csrf
        <input type="submit" value="Cancel">
    </form>
@endsection
