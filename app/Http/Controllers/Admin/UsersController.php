<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $form
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $form)
    {
        $form->save();

        return redirect('/admin/users')
            ->with('message', 'User has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $form
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $form, User $user)
    {
        $form->save();

        return redirect('/admin/users')
            ->with('message', 'User has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', 'User deleted successfully.');
    }
}
