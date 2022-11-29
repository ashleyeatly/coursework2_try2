<x-layout title="zones">
    <div class="w3-container w3-blue">
        <h1>User Doors and Zones Management</h1>
        <h2>Zones List</h2>
    </div>

    @include('partials.zones_index')
{{--    <table id="zone-table" class="table table-striped" style="width:100%">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Name</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($zones as $zone)--}}
{{--            <tr>--}}
{{--                <td><a href="{{route('zones.show',['zone'=>$zone])}}">{{$zone->name}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--    @push('scripts')--}}
{{--        <script>--}}
{{--            $(document).ready( function () {--}}
{{--                $('#zone-table').DataTable();--}}
{{--            } );--}}
{{--        </script>--}}
{{--    @endpush--}}
</x-layout>
