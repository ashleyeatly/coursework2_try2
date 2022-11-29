<x-layout title="doors">
        <h1>This is doors.index</h1>
        <ul>
            @foreach($doors as $door)
                <li>
                    <a href="{{route('doors.show',['door'=>$door])}}">{{$door->name}}
                </li>
            @endforeach
        </ul>
</x-layout>
