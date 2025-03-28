<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\Builders\UserBuilder;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $registerRequest)
    {
        $validatedUserData = $registerRequest->validated();
        $user = (new UserBuilder)
            ->setNameEn($validatedUserData['name_en'])
            ->setEmail($validatedUserData['email'])
            ->setPassword($validatedUserData['password'])
            ->build();

            Auth::login($user);

        if($user->hasRole(['admin', 'teacher'])){
            return redirect()->route('dashboard')->with('success', 'Welcome to the Admin Dashboard!');
        }
        return redirect()->route('homePage')->with('success', 'Welcome to the Home page');
    }
}
