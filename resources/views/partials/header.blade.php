<header>
{{--    This section has the large blue header Poppero2 --}}
{{--    <div class="masthead bg-primary text-white text-center py-4">--}}
{{--        <div class="container d-flex align-items-center flex-column">--}}
{{--            <h2>@yield('subtitle', 'Poppero2')</h2>--}}
{{--        </div>--}}
{{--    </div>--}}

    {{--    <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}


    {{-- This is the top Menu    --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
{{--        <div class="container-fluid">--}}
        <div class="container">
            <a class="navbar-brand" href="{{ route('pages.index') }}">Poppero2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ms-auto">
                        <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link active" href="{{ route('doors.index') }}">Doors</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link active" href="{{ route('zones.index') }}">Zones</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Users
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth
                            <li><a class="dropdown-item" href="{{ route('users.show',Auth::user()->id) }}">Own Details</a></li>
                            @endauth
                            <li><a class="dropdown-item" href="#">User Stuff</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">New User</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
