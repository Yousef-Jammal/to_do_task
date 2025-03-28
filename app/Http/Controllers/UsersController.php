<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::role('user')->get();  // Fetch users with roles

        // Transform each user with UserResource and pass the collection to the view
        $usersResource = UserResource::collection($users);

        // Return the users in a view
        return view('users.index', compact('usersResource'));
    }

    public function show(User $user)
    {
        // Transform the single user with UserResource
        $userResource = new UserResource($user);

        // Return the user data in a view
        return view('users.show', compact('userResource'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {   
        $roles = Role::all(); // Fetch all available roles
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name', // Validate role exists
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role); // Assign the selected role

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $roles = Role::all(); // Fetch all available roles
        $userRole = $user->roles->pluck('name')->first(); // Get the user's current role
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->syncRoles([$request->role]); // Sync the role (removes old roles, assigns new one)

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
