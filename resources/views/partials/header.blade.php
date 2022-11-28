<header>
{{--    <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
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
                </ul>
            </div>
        </div>
    </nav>
</header>
