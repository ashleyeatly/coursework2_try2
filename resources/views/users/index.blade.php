<x-layout title="users">
    @auth
        @if (Auth::user()->administrator)
            @include('partials.users_admin')
        @else
            @include('partials.users')
        @endif
     @endauth
</x-layout>
