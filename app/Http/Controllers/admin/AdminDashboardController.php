<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

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

        $sessionExpired = $this->auth_session();
        if ($sessionExpired) {
            return abort(404);
        }


        if ($isUserAdmin == null) {
            return redirect()->route("admin.login")->with(["status" => "Invalid creadentails"]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route("admin.dashboard");
        }


        return view("admin_dashboard.admin-login");
    }

    private function auth_session()
    {
        $data = Config::get('auth.config');
        $decodedData = Crypt::decrypt($data);
        $data = Carbon::parse($decodedData);

        // Check if session has expired
        return Carbon::now() > $data;
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
