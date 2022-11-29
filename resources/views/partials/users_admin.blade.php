<h1>just users</h1>
<table id="user-table" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach(App\Models\User::all() as $user)
        <tr>
            <td><a href="{{route('users.show',['user'=>$user])}}">{{$user->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
    <script>
        $(document).ready( function () {
            $('#user-table').DataTable();
        } );
    </script>
@endpush

<table id="user-table" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Adminstrator</th>
        <th>Expires</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach(App\Models\User::all() as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->administrator }}</td>
            <td>{{ $user->expires }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
    <script>
        $(document).ready( function () {
            $('#user-table').DataTable();
        } );
    </script>
@endpush
