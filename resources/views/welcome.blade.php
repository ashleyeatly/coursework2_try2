<x-layout title="Welcome">
{{--    <h1>Welcome</h1>--}}
    <style>
        .newspaper {
            column-count: 3;
            column-gap: 40px;
            /*column-rule-style: solid;*/
            /*column-rule-width: 1px;*/
            /*column-rule-color: lightblue;*/
            column-rule: 1px solid lightblue;
            column-width: 100px;
        }
        .newspaper_span {
            column-span: all;
        }
    </style>
    <div class="w3-container w3-blue">
        <h1>Peppero Users Doors and Zones Management</h1>
        <p>Allows administrators to manage Users, Doors and Zones</p>
        <p>Allows Users to view their details Doors and Zones</p>
    </div>
    <div class="w3-row-padding">
        <div class="w3-third">
            <h2>London</h2>
            <p>London is the capital city of England.</p>
            <p>It is the most populous city in the United Kingdom,
                with a metropolitan area of over 13 million inhabitants.</p>
        </div>

        <div class="w3-third">
            <h2>Paris</h2>
            <p>Paris is the capital of France.</p>
            <p>The Paris area is one of the largest population centers in Europe,
                with more than 12 million inhabitants.</p>
        </div>

        <div class="w3-third">
            <h2>Tokyo</h2>
            <p>Tokyo is the capital of Japan.</p>
            <p>It is the center of the Greater Tokyo Area,
                and the most populous metropolitan area in the world.</p>
        </div>
    </div>
    <div class="newspaper">
        <h2 class="newspaper_span">
            Heading across the gsdfgsdfgsdfgsdfgsdfgsdfgsdfgsdfgsdfgsdfgsfdgsdfgsdfgfhg columns
        </h2>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.
    </div>

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

