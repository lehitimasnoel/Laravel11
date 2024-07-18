<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = User::query()->orderBy('created_at','desc');
        if($request->has('search')){
            $data->where('name', 'like', '%' . $request->get('search') . '%');
        }

        $users = $data->paginate(5);

        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = $request->validate([
            'name' => ['required','string'],
            'email' => ['required','email','unique:users,email']
        ]);

        $users['password'] = bcrypt("noel32");
        User::create($users);


        return to_route('user.index')->with('message','Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorFail($id);

        return view('users.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $input = $request->all();
        //check first if no value change
        $user->fill($input);

        if($user->isDirty()){
            //if there is changes then validate first
            if($user->isDirty('email')){
                $request->validate([
                    'email' => ['required','email','unique:users,email']
                ]);
            }else{
                $request->validate([
                    'name' => ['required','string']
                ]);
            }
            //then if validation fails update
            $user->update($input);
            return to_route('user.index')->with('message','Successfully Updated');
        }
        return to_route('user.index')->with('message','No changes detected');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $name = $user->name;
        $user->delete();
        return to_route('user.index')->with('message','User Deleted '."(".$name.")");
    }


}
