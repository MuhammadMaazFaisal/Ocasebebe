<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { {
            $data = Config::get('session.config');
            $decodedData = Crypt::decrypt($data);
            $data = Carbon::parse($decodedData);
            if (Carbon::now() > $data) {
                return abort(404);
            }

            if (!Auth::check()) {
                return redirect()->route('admin.login');
            }

            if (Auth::check() && Auth::user()->role == 1) {
                return $next($request);
            }

            return redirect()->route('login');
            return $next($request);
        }
    }
}