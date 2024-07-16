<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $cred = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($cred)) {
            return redirect()->intended('/dashboard');
        } else {
            return back()->with("error", "The provided credentials do not match our records. Please try again.");
        }
    }

    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:255'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            return back()->with("success", "New user was registered successfully.");
        } else {
            return back()->with("error", "Something's wrong.");
        }
    }
}
