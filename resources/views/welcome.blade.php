<x-layout title="Welcome">
    <h1>Welcome</h1>
    <p>Please <a href="{{ route('login') }}">login</a>
        or <a href="{{ route('register') }}">register</a></p>

    <button>Help</button>
    <h1>Admin Area</h1>
    <p>You must be logged in to see this!</p>
{{--    <p>You are {{Auth::user()->name}}</p>--}}
    <p>Please <a href="{{ route('login') }}">login</a>
        or <a href="{{ route('register') }}">register</a></p>
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
</x-layout>

