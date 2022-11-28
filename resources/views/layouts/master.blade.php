<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />--}}
{{--    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />--}}
{{--    <title>@yield('title', 'Online Store')</title>--}}

    @include('partials.styles')
</head>
<body>
<!-- header -->
@include('partials.header')

{{--<header class="masthead bg-primary text-white text-center py-4">--}}
{{--    <div class="container d-flex align-items-center flex-column">--}}
{{--        <h2>@yield('subtitle', 'MASTER LAYOUTS')</h2>--}}
{{--    </div>--}}
{{--</header>--}}
<!-- header -->
@if($errors->any())
    <div>
        Errors:
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('message'))
    <p><b>{{session('message')}}</b></p>
@endif
<div class="container my-4">
    @yield('content')
</div>
<!-- footer -->
@include('partials.footer')
@include('partials.scripts')

</body>
</html>
