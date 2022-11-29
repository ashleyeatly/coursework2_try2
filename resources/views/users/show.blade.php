@extends('layouts.master')
{{--@extends('layouts.nav')--}}
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
    @auth
        @if(Auth::user()->administrator)
            <h1>Administrator has access to all doors and zones</h1>
        @elseauth
            <h1>Here are the zones and Doors</h1>
            @if ($user->zones())
                <table id="zone-table" class="table table-striped" style="width:100%">
                    @foreach($user->zones as $zone)
                        <thead>
                        <tr>
                            <th>Zone</th>
                            <th>Show</th>
                            @if(Auth::user()->administrator)
                                <th>Remove Access</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="{{route('zones.show',['zone'=>$zone])}}">{{$zone->name}}</td>
                            <td>
                                <form action="{{ route('zones.show',['zone'=>$zone]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Show</button>
                                </form>
                            </td>
                            @if(Auth::user()->administrator)
                                <td>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Remove</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        </tbody>

                        @if ($zone->doors())



                            @foreach($zone->doors as $door)
                                {{--                            <thead>--}}
                                {{--                                <tr>--}}
                                {{--                                    <th>Door Name</th>--}}
                                {{--                                    <th>Show Door</th>--}}
                                {{--                                </tr>--}}
                                {{--                            </thead>--}}
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="{{route('doors.show',['door'=>$door])}}">{{$zone->name."->".$door->name}}
                                    </td>
                                    <td>
                                        <form action="{{ route('doors.show',['door'=>$door]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Show</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                @endif
                            @endforeach
                            {{--        </tbody>--}}
                </table>
                @push('scripts')
                    <script>
                        $(document).ready( function () {
                            $('#zone-table').DataTable();
                        } );
                    </script>
                @endpush
            @endif

            @if ($user->doors()->count())
                <table id="door-table" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>Door Name</th>
                        <th>Show Door</th>
                        @if(Auth::user()->administrator)
                            <th>Remove Access</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->doors as $door)
                        <tr>
                            <td>
                                <a href="{{route('doors.show',['door'=>$door])}}">{{$door->name}}</a>
                            </td>
                            <td>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Show</button>
                                </form>
                            </td>
                            @if(Auth::user()->administrator)
                                <td>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Remove</button>
                                    </form>
                                </td>
                            @endif
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
            @endif
        @endauth
    @endauth

@endsection
