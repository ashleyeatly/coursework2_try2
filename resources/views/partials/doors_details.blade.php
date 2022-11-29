<h1>Doors</h1>
@if(Auth::user()->administrator)
    <form action="#" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Add Door</button>
    </form>
@endif
@if ($user->doors()->count())

    <table id="door-table" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>Door</th>
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
                    @if(Auth::user()->administrator)
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Show Door</button>
                        </form>
                    @endif
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
`@endif
