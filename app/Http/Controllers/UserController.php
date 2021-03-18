<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index')->with(['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "admin";
        $user->save();

        return redirect()->back()->withSuccess('User created sucessfully');

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with(['user' => $user]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->withSuccess('User updated sucessfully');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->withSuccess('User deleted sucessfully');
    }
}
