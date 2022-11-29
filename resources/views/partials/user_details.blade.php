<x-layout title="users_details">
    <form method="GET"
          action="{{route('users.index')}}">
        @csrf
        <button type="submit" class="btn btn-primary">Back</button>
    </form>
    <table id="user-table" class="table table-striped" style="width:100%">
        @php
//            $user = Auth::user();
            if ($user->administrator) {
                $flag = "true";

            } else {
                $flag = "false";
            }
        @endphp
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Administrator</th>
            <th>Expires</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> <form method="GET"
              action="{{route('users.show',['user'=>$user])}}">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$flag}}</td>
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
</x-layout>
