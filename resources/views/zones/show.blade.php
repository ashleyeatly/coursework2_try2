<x-layout title="zones">
    <ul>
        @foreach($zones as $zone)
            <li>
                <a href="{{route('zones.show',['zone'=>$zone])}}">{{$zone->name}}
            </li>
        @endforeach
    </ul>
</x-layout>

