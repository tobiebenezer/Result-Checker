<?php

namespace App\Http\Middleware;

use App\Models\entity;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HodAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role = entity::select('role')->where('id',Auth::user()->getEntity())->first()->role;
        if(Auth::user() && $role =='hod' ):
            return $next($request);
        else:
            return redirect()->route('home');
        endif;
    }
}
