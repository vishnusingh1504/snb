<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load roles to prevent N+1 query issues
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function view_profile(User $user)
    {
        return view('users.view-profile', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name')->toArray();
        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'roles' => 'required'
        ]);

        $user->syncRoles($validated['roles']);

        return redirect()->route('users.index')->with('success', 'User roles updated successfully.');
    }
    // Add to your UserController

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles')); // Blade file for the form
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle avatar upload
        $avatarPath = $request->file('avatar') ? $request->file('avatar')->store('avatars', 'public') : 'images/avatar-1.jpg';

        $user = User::create([
            'name' => $validated['name'],
            'dob' => $validated['dob'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
            'avatar' => $avatarPath,
            'created_at' => now(),
        ]);
        $user->assignRole($request->roles);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

}
