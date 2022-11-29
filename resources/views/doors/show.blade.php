
@extends('layouts.nav')

{{--@section('title', 'Door')--}}

@section('content')
{{--    @include('partials.doors_details')--}}
    <div class="panel panel-default">
        <!-- Content here -->
        <div class="panel-heading">Door</div>
        {{--        <a href="{{route('people.destroy',['id'=>$person->id])}}">Delete Person</a>--}}
        {{--        <a href="{{route('people.destroy',['id'=>$person->id])}}">Delete Person</a>--}}
        <div class="panel-body">
            <ul>
                <li>Name: {{$door->name}}</li>
            </ul>
            <form method="POST"
                  action="{{route('doors.destroy',['door'=>$door])}}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

            <form method="GET"
                  action="{{route('doors.create')}}">
                @csrf
                <button type="submit">Create</button>
            </form>

            <form method="GET"
                  action="{{route('doors.index')}}">
                @csrf
                <button type="submit">Back</button>
            </form>
        </div>
    </div>
@endsection

<x-layout title="doors">
    <h1>This is doors.show</h1>

    <ul>
        <li>Name: {{$door->name}}</li>
    </ul>
</x-layout>
