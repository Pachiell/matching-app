<?php

namespace App\Http\Controllers;

use App\Mail\PostMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PasswordChangeController extends Controller
{
    

    public function Receive_destination()
    {
        return view('auth/passwords/receive_destination_form', []);
    }

    public function SendMail(Request $request)
    {
        $email = $request->email;
        $emailMatch = User::where('email', $email)->first();

        if ($emailMatch) {
            Mail::to($email)->send(new PostMail($emailMatch));
            return view('mail/send_complete', []);
        } else {
            return view('forms/receive_destination_form', [
                'error' => '登録されているメールアドレスが存在しません'
            ]);
        }
    }

    public function updatePasswordForm(){


        return view('forms/change_password_form',[

        ]);
    }

    public function updatePassword(User $user,Request $request){

        dd($user);

        $user->password = Hash::make($request['password']);

        return view('forms/change_password_form',[

        ]);
    }
}
