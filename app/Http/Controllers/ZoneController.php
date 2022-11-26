<?php

namespace App\Http\Controllers;


use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::all();
        // return $view->make('doors.index',compact('doors'));
        return view('zones.index',['zones'=>$zones]);
    }


    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Zone $zone)
    {
    }

    public function edit(Zone $zone)
    {
    }

    public function update(Request $request, Zone $zone)
    {
    }

    public function destroy(Zone $zone)
    {
    }
}
