<x-layout title="users">
    @include('partials.users_admin')
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
</x-layout>
