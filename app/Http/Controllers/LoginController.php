<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function form()
    {
        return view('login.signInForm');
    }
    public function connect(Request $request)
    {
        // $users = User::all();
        // foreach ($users as $user) {
        //     $user->password = Hash::make($user->password);
        //     $user->save();
        // }

        $credentials = $request->only('email','password');
        // $credentials = [
        //     'email' => $request->input('email'),
        //     'password' => $request->get('password')
        // ];

        // if (Auth::attempt($credentials)) {
        //     return "Authentication successful";
        // } else {
        //     return "Authentication failed";
        // }
        // dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route('posts.show');
        }else{
            return back()->withErrors([
                'email' => 'Email / Password incorrect !!!'
            ])->onlyInput('email');
        }
    }
    public function signUp()
    {
        return view('login.signUpForm');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => ['required','email'],
            'password' => ['required','min:8']
        ]);
        User::create($validatedData);
        return to_route('login.form');
    }
    public function logout(Session $session)
    {
        $session->flush();
        Auth::logout();
        return to_route('login.form');
    }
}
