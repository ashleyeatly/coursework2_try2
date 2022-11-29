<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use PasswordValidationRules;
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        // return $view->make('doors.index',compact('doors'));
        return view('users.index',['users'=>$users]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'administrator' => ['required', 'boolean', 'max:1'],
            'expires' => ['required', 'date'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ]);
        $a = new User;
        $a->name = $validatedData['name'];
        $a->first_name = $validatedData['first_name'];
        $a->last_name = $validatedData['last_name'];
        $a->administrator = $validatedData['administrator'];
        $a->expires = $validatedData['expires'];
        $a->email = $validatedData['email'];
        $a->password=bcrypt($validatedData['password']);
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
        $all_zones = DB::table('zones')->select('id','name')->get();
        $all_doors = DB::table('doors')->select('id','name')->get();
        return view('users.show',['user'=>$user,'all_zones'=>$all_zones,'all_doors'=>$all_doors]);
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
        return redirect()->route('users.index')
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
