<h1>Zones</h1>
@if(Auth::user()->administrator)

    <form action="#" method="GET">
        <select name="zone" id="zone" >
            <option value="">PleaseSelect</option>
            @foreach( $all_zones as $zone)
                <option value="{{$zone->id}}">{{$zone->name}}</option>
            @endforeach
        </select>
        @csrf
        <button type="submit" class="btn btn-primary">Add Zone</button>
    </form>
@endif
@if ($user->zones())
    <table id="zone-table" class="table table-striped" style="width:100%">
        @foreach($user->zones as $zone)
            <thead>
            <tr>
                <th>Zone</th>
                <th>Door</th>
                <th>    </th>
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
                    @if(Auth::user()->administrator)
                        <form action="{{ route('zones.show',['zone'=>$zone]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary">Zone Admin</button>
                        </form>
                    @endif
                </td>
                @if(Auth::user()->administrator)
                    <td>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Remove Access To Zone</button>
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
                            @if(Auth::user()->administrator)
                                <form action="{{ route('doors.show',['door'=>$door]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Door Admin</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if(Auth::user()->administrator)
                                <form action="{{ route('doors.show',['door'=>$door]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Remove Door From Zone</button>
                                </form>
                            @endif
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
