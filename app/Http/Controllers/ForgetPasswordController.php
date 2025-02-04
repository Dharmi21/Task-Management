<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Password;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('Auth.password_reset');
    }

    public function forgetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);
        $token = Str::random(64);
        $insert = Password::create([
            'email' => $request->email,
            'token' => $token
        ]);
        Mail::send('email.test', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset password');
        });
        return back()->with('message', 'Password reset link send succefully🎉');
    }
    public function resetpassword($token)
    {
        $data = Password::where('token', $token)->get();

        return view('Auth.forget_password', ['data' => $data]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('Auth.forget_password');
    }


    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'conform_password' => 'required'
        ]);
        $email = $request->email;


        $id = User::where('email', $email)->get('id');

        if ($request->password == $request->conform_password) {
            $hash_password = Hash::make($request->password);
            $affected = DB::table('users')
                ->where('email', $email)
                ->update(['password' => $hash_password]);
            // $update_data=User::find($id);

            // $update_data->password=$request->password;


            // $update_data->update();
            // return view('Auth.login')->with('message','Password updated!!');
            return redirect()->to(route('login'))->with('message','Password updated!!');
        } else {
            return back()->with('error', 'Passwords not matched🙅‍♀️');
        }
    }


    public function destroy(User $user)
    {
        //
    }
}
