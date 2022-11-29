`<table id="zone-table" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($zones as $zone)
        <tr>
            <td><a href="{{route('zones.show',['zone'=>$zone])}}">{{$zone->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('scripts')
    <script>
        $(document).ready( function () {
            $('#zone-table').DataTable();
        } );
    </script>
@endpush


