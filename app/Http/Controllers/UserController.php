<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(7);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'Super-Admin')->get();
        $user = new User();
        return view('user.create', compact('user', 'roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::whereId($id)->firstOrFail();
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::where('name', '!=', 'Super-Admin')->get();
        //$userRole = $user->roles->pluck('name','name')->all();
        //dd($userRole);
        //$user = new User();
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|numeric|max:255',
            'department' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'isAdmin' => 'sometimes|string|max:255',
            'isActive' => 'sometimes|string|max:255',
        ]);

        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->department = $request->department;
        $user->rank = $request->role;

        if ($request->has('isActive')) {
            $user->isActive = 1;
        } else  {
            $user->isActive = 0;
        }

        if ($request->has('isAdmin')) {
            $user->isAdmin = 1;
        } else  {
            $user->isAdmin = 0;
        }

        $user->save();

        return redirect()->back()->with('success_message', 'User profile has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            '_token' => 'required',
            //'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::whereId($id)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        return redirect()->back()->with('success_message', 'User password has been updated successfully.');
    }
}
