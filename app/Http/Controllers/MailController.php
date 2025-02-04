<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailTestJob;
use App\Models\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function mail_send(Request $request)
    {
        $request->validate([
       'email'=>"required|email|exists:users"
        ]);
        $token=Str::random(64);
        $insert=Password::create([
         'email'=>$request->email,
         'token'=>$token
        ]);




        // $email = $request->email;

            $data1['email'] =  $request->email;



            // dispatch(new App\Jobs\SendMailTestJob($data));


            $send = dispatch(new SendMailTestJob($token,$data1));
            // if ($send) {

            //     return back()->with('message', 'Password reset link send succefully🎉');
            // } else {
            //     return back()->with('message', 'There Is Some System Error🙅‍♀️');
                // $message='There Is Some System Error🙅‍♀️';
            // }
        // }
        // else{
        //     return back()->with('message', 'We do not have this email address!!');
        // }


        // return view(route('reset_link'),['message'=>$message]);
    }

    public function page_reset(Request $request)
    {
        return view('Auth.password_reset');
    }
}
