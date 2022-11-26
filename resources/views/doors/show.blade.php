<x-layout title="doors">
    <ul>
        @foreach($doors as $door)
            <li>
                <a href="{{route('doors.show',['door'=>$door])}}">{{$door->name}}
            </li>
        @endforeach
    </ul>
</x-layout>
