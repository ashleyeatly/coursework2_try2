<x-layout title="users_admin_details">
<h1>Admin View</h1>
<form method="GET"
      action="{{route('users.index')}}">
    @csrf
    <button type="submit" class="btn btn-primary">Back</button>
</form>

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
    @foreach(App\Models\User::all() as $user)
        @php
            if ($user->administrator) {
                $flag = "true";

            } else {
                $flag = "false";
            }
        @endphp
        <tr>
            <td>
                <form method="GET"
                      action="{{route('users.show',['user'=>$user])}}">
                    @csrf
                    @method('GET')
                    <button type="submit">Edit</button>
                </form>
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $flag}}</td>
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
</x-layout>
