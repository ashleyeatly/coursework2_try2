<x-layout title="Welcome">
    <div class="w3-container w3-blue">
        <h1>User Doors and Zones Management</h1>
        @auth
            <p>User is logged In</p>
            @if(Auth::user()->isExpired())
                <p>Your Access Has Expired</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            @else
                <p>You are logged in</p>
                <p>Allows administrators to manage Users, Doors and Zones</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            @endif
        @elseauth
            <p>Allows Users to view their details Doors and Zones</p>
        @endauth
        @guest
            <p>You are a guest user but unless you login then no access is allowed </p>
            <p>If you attempt to access any facilities you will be prompted to enter email and password</p>
            <p>If you do not have credentials please contact admin</p>
            <p>Only Administrators have access to perform Editing of data</p>
            <p>Standard Users will be allowed to view and update personal details only</p>
            <form action="{{ route('login') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        @endguest
        {{--        <p>Please <a href="{{ route('login') }}">login</a>--}}
        {{--        <p>Allows Users to view their details Doors and Zones</p>--}}
    </div>
</x-layout>

