<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

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
        $user->role = 2;
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


    public function forgot_password_email(Request $request)
    {
        $validated = $request->validate(['email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',]);

        if (Auth::check() && Auth::user()->role == 1) {
            $notification = array('error' => 'You are logged in as admin please logout first ! ',);
            return redirect()->route('forget.password')->with($notification);
        }


        $user = User::where('email', $request->email)->first();

        $token = Str::random(10);
        DB::table('password_resets')->insert(['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]);

        if (!empty($user)) {
            $check_admin = User::where('email', $request->email)->first();
            if ($check_admin->role == 1) {
                $notification = array('error' => 'You can not reset password from here !',);

                return redirect()->route('forget.password')->with($notification);
            }
            $token;
            $urlhtml = view('email_templates.v-code', compact('token'))->render();
            $subject = "Reset Password Email From Ô'CASE BÉBÉ";
            $data = ['email' => $request->email, 'subject' => $subject, 'html' => $urlhtml];
            email($data);
            $notification = array('status' => 'We have sent you an email to reset password ! ',);
            return back()->with($notification);
        } else {
            $notification = array('error' => 'This email does not exist !',);
            return back()->with($notification);
        }
    }

    public function verify_code(Request $request)
    {
        $validated = $request->validate(['code' => 'required',]);

        $check_code = DB::table('password_resets')->where('token', $request->code)->first();

        if (!empty($check_code)) {
            $notification = array('status' => 'Code verified !', 'code' => $request->code);
            return redirect()->route('update.password')->with($notification);
        } else {
            $notification = array('error' => 'Code does not match !',);
            return back()->with($notification);
        }
    }

    public function change_password(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($request->new_password != $request->confirm_password) {
            $notification = array('u-error' => 'Password does not match !',);
            return back()->with($notification);
        }



        $check_code = DB::table('password_resets')->where('token', $request->code)->first();

        if (!empty($check_code)) {
            $user = User::where('email', $check_code->email)->first();
            $user->password = bcrypt($request->new_password);
            $user->save();
            DB::table('password_resets')->where('email', $check_code->email)->delete();
            $notification = array('u-status' => 'Password changed successfully !',);
            return back()->with($notification);
        } else {
            $notification = array('u-error' => 'Code does not match !',);
            return back()->with($notification);
        }
    }
}
