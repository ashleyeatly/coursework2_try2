{{--<x-layout title="User">--}}
@extends('layouts.nav')
{{--@extends('layouts.nav')--}}
{{--@section('title', 'User')--}}

@section('content')

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
            <h1>Zones</h1>
            @if ($user->zones())
                <table id="zone-table" class="table table-striped" style="width:100%">
                    @foreach($user->zones as $zone)
                        <thead>
                        <tr>
                            <th>Zone</th>
                            <th>Door</th>
                            <th>Show</th>
                            @if(Auth::user()->administrator)
                                <th>Remove Access</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="{{route('zones.show',['zone'=>$zone])}}">{{$zone->name}}</td>
                            <td></td>
                            <td>
                                <form action="{{ route('zones.show',['zone'=>$zone]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Show Zone</button>
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
                                <tbody>
                                <tr>
                                    <td>
{{--                                    <a href="{{route('zones.show',['zone'=>$zone])}}">{{$zone->name}}--}}
                                    </td>
                                    <td>
                                        <a href="{{route('doors.show',['door'=>$door])}}">{{$door->name}}
                                    </td>
                                    <td>
                                        <form action="{{ route('doors.show',['door'=>$door]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Show Door</button>
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
            <h1>Doors</h1>
{{--            now doors--}}
            @if ($user->doors()->count())
                <table id="door-table" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>Door</th>
                        <th></th>
                        <th>Show</th>
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
                            <td></td>
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
{{--</x-layout>--}}
