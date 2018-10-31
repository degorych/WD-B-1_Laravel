<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormRequest;
use App\Form;
use App\User;
use Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->cant('index', Form::class)) {
            return redirect('/');
        }

        $forms = Form::paginate(5);
        return view('form.index', ['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->can('create', Form::class) && $user->can('isNotBlocked', User::class)) {
            return view('form.create');
        }

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::user()->id;

        Form::create($data);

        return redirect()->back()->with('message', 'You sent form successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        if ($user->cant('show', Form::class)) {
            return redirect('/');
        }

        $showForm = Form::findOrFail($id);
        return view('form.show', ['showForm' => $showForm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        if ($user->cant('edit', Form::class)) {
            return redirect('/');
        }

        $editForm = Form::findOrFail($id);
        return view('form.edit', ['editForm' => $editForm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest $request, $id)
    {
        $form = Form::findOrFail($id)->fill($request->input())->save();

        return redirect()->route('form.index')->with('message', 'You update form successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return redirect()->route('form.index')->with('message', 'You delete form successfully');
    }
}
