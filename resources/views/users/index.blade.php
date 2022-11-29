<x-layout title="users">
    @auth
        @if (Auth::user()->administrator)
            @include('partials.users_admin_details')
        @else
            @include('partials.users')
        @endif
    @endauth
</x-layout>
