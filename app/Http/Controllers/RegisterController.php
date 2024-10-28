<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Signup',
            'meta' => [
                'url' => url('/signup/'),
                'desc' => "Signup",
                'keyword' => "Signup",
            ],
        ];
        return view('oauth.register', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "username" => 'required|alpha_dash:ascii|min:5|max:255|unique:users,username',
            "fullname" => 'required|max:255',
            "email" => 'required|email:dns|unique:users,email',
            'password' => 'required|min:5',
            'password2' => 'required|min:5|same:password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['is_admin'] = false;
        $validatedData['image'] = 'default.png';

        User::create($validatedData);

        return redirect('/signin')->with('success', 'Your account has been register. Please signin');
    }
}
