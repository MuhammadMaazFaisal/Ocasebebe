<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $notification = array(
                'message' => 'Login Successful',
                'alert-type' => 'success'
            );
        } else {
            if (User::where('email', $request->email)->exists()) {
                $notification = array(
                    'message' => 'Password Invalid',
                    'alert-type' => 'error'
                );
            } else {
                $notification = array(
                    'message' => 'Please Register First',
                    'alert-type' => 'error'
                );
            }
        }
        return $notification;
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->role = 1;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::login($user);
        $notification = array(
            'message' => 'Registration Successful',
            'alert-type' => 'success'
        );
        return $notification;
    }
}
