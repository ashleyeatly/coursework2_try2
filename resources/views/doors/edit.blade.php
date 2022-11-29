@extends('layouts.master')

@section('title', 'Person')

@section('content')

    <div class="panel panel-default">
        <!-- Content here -->
        <div class="panel-heading">Panel Heading</div>
        {{--        <a href="{{route('people.destroy',['id'=>$person->id])}}">Delete Person</a>--}}
        {{--        <a href="{{route('people.destroy',['id'=>$person->id])}}">Delete Person</a>--}}
        <div class="panel-body">
            <ul>
                <li>Title: {{$person->title}}</li>
                <li>First Name: {{$person->first_name}}</li>
                <li>Surname: {{$person->surname}}</li>
                <li>Address: {{$person->address}}</li>
            </ul>
            <form method="POST"
                  action="{{route('people.destroy',['person'=>$person])}}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

            <form method="GET"
                  action="{{route('people.create')}}">
                @csrf
                <button type="submit">Create</button>
            </form>

            <form method="GET"
                  action="{{route('people.index')}}">
                @csrf
                <button type="submit">Back</button>
            </form>
        </div>
    </div>
@endsection
