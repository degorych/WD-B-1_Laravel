<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function showUserList()
    {
        $user = Auth::user();

        if ($user->cant('show', User::class)) {
            return redirect('/');
        }

        $users = User::paginate(5);
        return view('user.list', ['users' => $users]);
    }

    public function showUserData($id)
    {
        $user = Auth::user();

        if ($user->cant('show', User::class)) {
            return redirect('/');
        }

        $showUser = User::all()->where('id', '==', $id)->first();
        return view('user.id', ['showUser' => $showUser]);
    }

    public function updateUserData($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|max:20|alpha',
            'email' => 'bail|required|email',
            'block' => 'alpha',
        ]);

        $user = User::all()->where('id', '==', $id)->first();
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'is_blocked' => $request->block ? true : false,
        ]);

        $user->save();

        return redirect()->route('userList')->with('message', 'You update user successfully');
    }
}
