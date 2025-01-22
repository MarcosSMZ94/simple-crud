<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request) {
        $fields = $request->validate([
            'loginname' => ['required', 'string', 'max:255'],
            'loginpassword' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        if (Auth::attempt(['name' => $fields['loginname'], 'password' => $fields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    public function register(Request $request) {
        $fields = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
