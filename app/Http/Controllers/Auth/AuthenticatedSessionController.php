<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;


class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request->session()->regenerate();

            return redirect(route('user_home'));
        }
        else{
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();

        return redirect(route('index'));
    }
}
