<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view("users.create");
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('status', 'Registeration Success.');
    }

    public function login(){
        return view("users.login");
    }

    public function check(Request $request){
        $request->validate([
            'email'=>'required',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return redirect("posts");
        };
        return redirect('login');
    }

    public function logout(){
        Auth::logout();
        return redirect("login");
    }
}
