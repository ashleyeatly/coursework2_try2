<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        // return $view->make('doors.index',compact('doors'));
        return view('users.index',['users'=>$users]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
//            'name' =>  ['required',Rule::in(['Mr', 'Mrs', 'Miss','Ms','Dr','Dr.','Doctor'])],
            'name' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'administrator' => 'required|boolean',
            'expires' => 'required|date'
        ]);
        $a = new User;
        $a->name = $validatedData['name'];
        $a->first_name = $validatedData['first_name'];
        $a->last_name = $validatedData['last_name'];
        $a->administrator = $validatedData['administrator'];
        $a->expires = $validatedData['expires'];
        $a->save();
        session()->flash('message','User was created');
        return redirect()->route('users.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('users.show',['user'=>$user]);
    }

    public function edit(User $user)
    {
    }

    public function update(Request $request, User $user)
    {
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
            ->with('message','User was deleted');
    }

    public function getUsers(Request $request)
    {
        dd($request->ajax());
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
