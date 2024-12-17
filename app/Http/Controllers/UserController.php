<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:35'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:12', 'max:64']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/');

    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request): RedirectResponse
    {

        $incomingFields = $request->validate([
            'login_email' => 'required',
            'login_password' => 'required'
        ]);

        if (Auth::attempt(['email' => $incomingFields['login_email'], 'password' => $incomingFields['login_password']])) {
            return redirect('/');
        }

        return back()->with('error', 'Email or Password incorrect');
    }

}
