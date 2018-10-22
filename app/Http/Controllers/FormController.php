<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\User;
use Auth;

class FormController extends Controller
{
    public function showFormsList()
    {
        $user = Auth::user();

        if ($user->can('show', Form::class)) {
            return view('form.manager');
        }

        return redirect('/');
    }

    public function adminUpdateForm()
    {
        $user = Auth::user();

        if ($user->can('update', Form::class)) {
            return view('form.fill');
        }

        return redirect('/');
    }

    public function userShowForm()
    {
        $user = Auth::user();

        if ($user->can('show', Form::class)) {
            return view('form.fill');
        }

        return redirect('/');
    }

    public function userSendForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|max:20|alpha',
            'surname' => 'bail|required|max:25|alpha',
            'burn' => 'required|date',
            'phone' => 'regex:/\d+/',
            'gender' => 'bail|required|alpha|max:5',
        ]);

        Form::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'burn' => $request->burn,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('message', 'You sent form successfully');
    }
}
