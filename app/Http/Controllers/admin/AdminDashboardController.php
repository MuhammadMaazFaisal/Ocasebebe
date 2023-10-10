<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{ 
    public function admin_login()
    {

        if (Auth::check() && Auth::user()->role == '1') {
            return redirect()->route("admin.dashboard");
        }

        return view("admin_dashboard.admin-login");
    }

    public function admin_auth(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|max:100',
            'password' => 'required|max:100',
        ]);

        $isUserAdmin = User::where([
            "email" => $request->email,
            "role" => '1'
        ])->first();

        if ($isUserAdmin == null) {
            return redirect()->route("admin.login")->with(["status" => "Invalid creadentails"]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route("admin.dashboard");
        }


        return view("admin_dashboard.admin-login");
    }

    public function admin_dashboard()
    {
        return view("home");
    }

    public function admin_logout()
    {

        Auth::logout();
        return redirect()->route("admin.login");
    }
}
