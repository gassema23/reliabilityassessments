<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovedUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle( Request $request , Closure $next )
    {
;        if (auth()->check()) {
            if (is_null(auth()->user()->approved_at)) {
                Auth::logout();
                toastr()->warning(__('generals.notifications.approval-accounts'));
                return redirect()->route('login');
            }
        }
        return $next($request);
    }
}
