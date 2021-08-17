<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //return view('user.create', compact('user', 'roles'));
        //return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|numeric',
            'department' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->has('isActive')){
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        if ($request->has('isAdmin')){
            $isAdmin = 1;
        } else {
            $isAdmin = 0;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'phone' => $request->phone,
            'department' => $request->department,
            'rank' => $request->role,
            'isAdmin' => $isAdmin,
            'isActive' => $isActive,
        ]);

        $user->assignRole($request->input('role'));


        //event(new Registered($user));

        //Auth::login($user);

        return redirect()->back()->with('success_message', 'New user has been created successfully.');
        //return redirect(RouteServiceProvider::HOME);
    }
}
