@extends('layouts.master')

@section('title', 'User')

@section('content')
    <table id="user-table" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Administrator</th>
            <th>Expires</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->administrator}}</td>
            <td> {{$user->expires}}</td>
        </tr>
        </tbody>
    </table>
    @push('scripts')
        <script>
            $(document).ready( function () {
                $('#user-table').DataTable();
            } );
        </script>
    @endpush

    <form method="POST"
          action="{{route('users.destroy',['user'=>$user])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <form method="GET"
          action="{{route('users.create')}}">
        @csrf
        <button type="submit">Create</button>
    </form>

    <form method="GET"
          action="{{route('users.index')}}">
        @csrf
        <button type="submit">Back</button>
    </form>

    <table id="zone-table" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>Zone Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->zones as $zone)
            <tr>
                <td><a href="{{route('zones.show',['zone'=>$zone])}}">{{$zone->name}}</td>
                <thead>
                <tr>
                    <th>Door Name</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($zone->doors as $door)
                    <tr>
                        <td><a href="{{route('doors.show',['door'=>$door])}}">{{$zone->name}} -> {{$door->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </tr>
        @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script>
            $(document).ready( function () {
                $('#zone-table').DataTable();
            } );
        </script>
    @endpush

    <table id="door-table" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>Door Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->doors as $door)
            <tr>
                <td><a href="{{route('doors.show',['door'=>$door])}}">{{$door->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script>
            $(document).ready( function () {
                $('#door-table').DataTable();
            } );
        </script>
    @endpush

@endsection
