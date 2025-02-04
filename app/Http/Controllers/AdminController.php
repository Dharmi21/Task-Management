<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('management.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        if (auth()->guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // $request->session()->regenerate();
            return redirect(route('home'));
        } else {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }
    public function logout(Request $request)
    {
        // Auth::guard('admin')->logout();
        // return redirect('/');
       auth()->guard('admin')->logout();


        return redirect(route('index'));
    }
}
