<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('panels.register.register');
    }

    public function registerUser(Request $request): RedirectResponse
    {
        $incomingFields = $request->validate([
            'firstname' => ['required', 'min:3', 'max:35'],
            'surname' => ['required', 'min:3', 'max:35'],
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

    public function login()
    {
        return view('panels.login.login');
    }

    public function loginSubmission(Request $request): RedirectResponse
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
