{{--<x-layout title="User">--}}
@extends('layouts.nav')
{{--@extends('layouts.nav')--}}
{{--@section('title', 'User')--}}

{{--@section('content')--}}
@include('partials.user_details')

{{--    <form method="POST"--}}
{{--          action="{{route('users.destroy',['user'=>$user])}}">--}}
{{--        @csrf--}}
{{--        @method('DELETE')--}}
{{--        <button type="submit">Delete</button>--}}
{{--    </form>--}}

{{--    <form method="GET"--}}
{{--          action="{{route('users.create')}}">--}}
{{--        @csrf--}}
{{--        <button type="submit">Create</button>--}}
{{--    </form>--}}


    @auth
        @if($user->administrator)
            <h1>Administrator has access to all doors and zones</h1>
        @else
            @include('partials.zone_details')
            @include('partials.doors_details')
        @endif
    @endauth

{{--@endsection--}}
{{--</x-layout>--}}
