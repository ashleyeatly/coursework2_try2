<h1>Non admin users can only access own user record</h1>

<table id="user-table" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th></th>
        <th>Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Adminstrator</th>
        <th>Expires</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @php
        $user = Auth::user();
        if ($user->administrator) {
            $flag = "true";

        } else {
            $flag = "false";
        }
    @endphp
        <tr>
            <td> <form method="GET"
                       action="{{route('users.show',['user'=>$user])}}">
                    @csrf
                    @method('GET')
                    <button type="submit">Edit</button>
                </form></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $flag }}</td>
            <td>{{ $user->expires }}</td>
            <td>{{ $user->email }}</td>
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
