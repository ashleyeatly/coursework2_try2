{{--<x-layout title="User">--}}
@extends('layouts.nav')
{{--@extends('layouts.nav')--}}
{{--@section('title', 'User')--}}

@section('content')
{{--    @include('partials.user_details')--}}
{{--<x-layout title="users">--}}
    @auth
        @if (Auth::user()->administrator)
            @include('partials.users_admin_details')
        @else
            @include('partials.users')
        @endif
    @endauth
{{--</x-layout>--}}
