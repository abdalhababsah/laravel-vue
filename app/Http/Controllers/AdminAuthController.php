<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;
class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return inertia::render('Admin/Auth/Login');
    }
    public function login(Request $request)
    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isAdmin' => 1])){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login')->with('error','Invalid credentials.');
    }
    public function logout(Request $request){

        Auth::guard('web')->logout();
        $request->session()->invalidate();
    }

}
