<header>
    {{-- This is the top Menu    --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
{{--        <div class="container-fluid">--}}
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">Poppero2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
{{--                    <li class="nav-item ms-auto">--}}
{{--                        <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">Users</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item ms-auto">--}}
{{--                        <a class="nav-link active" href="{{ route('doors.index') }}">Doors</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item ms-auto">--}}
{{--                        <a class="nav-link active" href="{{ route('zones.index') }}">Zones</a>--}}
{{--                    </li>--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User Resource
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth
                                <li><a class="dropdown-item" href="{{ route('users.show',Auth::user()->id) }}">Personal Details</a></li>
                                @if (Auth::user()->administrator)
                                    <li><a class="dropdown-item" href="{{ route('users.index')}}">User Admin</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('users.create') }}">New User</a></li>
                                @endif
                            @endauth
                            @guest
                                    <li><a class="dropdown-item" href="{{ route('users.index')}}">Login to access</a></li>
                            @endguest
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                            @if(Auth::user()->administrator)
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Door Resource
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @auth
                                        <li><a class="dropdown-item" href="{{ route('doors.show',Auth::user()->id) }}">Door Details</a></li>
                                        <li><a class="dropdown-item" href="{{ route('doors.index')}}">Door Admin</a></li>
                                        <li><a class="dropdown-item" href="{{ route('doors.create') }}">New Door</a></li>
                                    @endauth
                                    @guest
                                        <li><a class="dropdown-item" href="{{ route('doors.index')}}">Login to access</a></li>
                                    @endguest
                                </ul>
                            @endif
                        @endauth
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                            @if(Auth::user()->administrator)
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Zone Resource
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @auth
                                        <li><a class="dropdown-item" href="{{ route('zones.show',Auth::user()->id) }}">Zone Details</a></li>
                                        <li><a class="dropdown-item" href="{{ route('zones.index')}}">Zone Admin</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('zones.create') }}">New Zone</a></li>
                                    @endauth
                                    @guest()
                                        <li><a class="dropdown-item" href="{{ route('zones.index')}}">Login to access</a></li>
                                    @endguest
                                </ul>
                            @endif
                        @endauth
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Back
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
