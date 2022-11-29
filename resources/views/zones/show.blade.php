@extends('layouts.master')

{{--@section('title', 'Zone')--}}

@section('content')

    <div class="panel panel-default">
        <!-- Content here -->
        <div class="panel-heading">Zone</div>
        {{--        <a href="{{route('people.destroy',['id'=>$person->id])}}">Delete Person</a>--}}
        {{--        <a href="{{route('people.destroy',['id'=>$person->id])}}">Delete Person</a>--}}
        <div class="panel-body">
            <ul>
                <li>Name: {{$zone->name}}</li>
            </ul>
            <form method="POST"
                  action="{{route('zones.destroy',['zone'=>$zone])}}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

            <form method="GET"
                  action="{{route('zones.create')}}">
                @csrf
                <button type="submit">Create</button>
            </form>

            <form method="GET"
                  action="{{route('zones.index')}}">
                @csrf
                <button type="submit">Back</button>
            </form>
        </div>
    </div>
@endsection

<x-layout title="zone">
    <h1>This is zone.show</h1>

    <ul>
        <li>Name: {{$zone->name}}</li>
    </ul>
</x-layout>


