<?php

namespace App\Http\Controllers;

use App\Models\Door;
use Illuminate\Http\Request;

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

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Door $door)
    {
    }

    public function edit(Door $door)
    {
    }

    public function update(Request $request, Door $door)
    {
    }

    public function destroy(Door $door)
    {
    }
}
