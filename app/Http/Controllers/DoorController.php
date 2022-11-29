<?php

namespace App\Http\Controllers;

use App\Models\Door;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoorController extends Controller
{

//    protected $view;
//    public function __construct(View $view)
//    {
//        $this->view = $view;
//    }

    public function index()
    {
        $doors = Door::all();
       // return $view->make('doors.index',compact('doors'));
        return view('doors.index',['doors'=>$doors]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(Door::class)],
        ]);
        $a = new Door;
        $a->name = $validatedData['name'];
        $a->save();
        session()->flash('message','Door was created');
        return redirect()->route('doors.index');
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
        $a = new Door;
        $a->name = $validatedData['name'];
        $a->save();
        session()->flash('message','Door was created');
        return redirect()->route('doors.index');
    }

    public function show(Door $door)
    {
        return view('doors.show',['door'=>$door]);
    }

    public function edit(Door $door)
    {
    }

    public function update(Request $request, Door $door)
    {
    }

    public function destroy(Door $door)
    {
        $door->delete();
        return redirect()->route('doors.index')
            ->with('message','Door was deleted');
    }
}
