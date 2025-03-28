<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
        // return $loginRequest;
        $credentials = $loginRequest->only('email', 'password');

        if (Auth::attempt($credentials)) {


            // $user = User::find(Auth::id());
            // $user->load('roles');
            $user = Auth::user();

            if ($user->hasRole(['admin'])) {
                return redirect()->route('users')->with('success', 'Welcome to the Admin Dashboard!');
            }
            return redirect()->route('user-task')->with('success', 'Welcome back!');
        }
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate(); // Invalidates the current session
        $request->session()->regenerateToken(); // Regenerates the CSRF token
        
        return redirect(route('login')); 
    }
}
