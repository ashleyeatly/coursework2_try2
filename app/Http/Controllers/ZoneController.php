<?php

namespace App\Http\Controllers;


use App\Models\Zone;
use Illuminate\Validation\Rule;
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
        return view('zones.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(Zone::class)],
             ]);
        $a = new Zone;
        $a->name = $validatedData['name'];
        $a->save();
        session()->flash('message','Zone was created');
        return redirect()->route('zones.index');
    }

    public function show(Zone $zone)
    {
        return view('zones.show',['zone'=>$zone]);
    }

    public function edit(Zone $zone)
    {
    }

    public function update(Request $request, Zone $zone)
    {
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        return redirect()->route('zones.index')
            ->with('message','Zone was deleted');
    }
}
