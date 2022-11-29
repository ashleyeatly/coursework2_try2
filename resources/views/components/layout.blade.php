<!doctype html>
<html lang="en">
<head>
  @include('partials.styles')
</head>
<body>
{{--gives the menu --}}
@include('partials.header')

<div class="container py-3">
{{--    <h1 class="p-3 mb-3 bg-primary text-white rounded">{{ config('app.name') }}</h1>--}}
{{--    @auth--}}
{{--        <h1>Authorised</h1>--}}
{{--        <h2>{{Auth::user()->name}}</h2>--}}
{{--        @if (Auth::user()->administrator)--}}
{{--            <h3>Administrator</h3>--}}
{{--        @endif--}}
{{--        <form action="{{ route('logout') }}" method="POST">--}}
{{--            @csrf--}}
{{--            <button type="submit" class="btn btn-primary">Logout</button>--}}
{{--        </form>--}}
{{--    @else--}}
{{--        <h1>You have not logged in to use the site features</h1>--}}
{{--    @endauth--}}

    {{ $slot }}
</div>
@include('partials.scripts')
{{--<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>--}}
@stack('scripts')
</body>
</html>
