<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAuth
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
        if (Auth::guest()) {
            return $next($request);
        } 
        if (!Auth::guest()) {
            /** @var User $user */
            $user = Auth::user();
            if ($user instanceof User && $user->type == \UserType::EVENT_ORGANIZER) {
                return redirect()->guest('/organizer');
            }
            if ($user instanceof User && $user->type == \UserType::ADMIN) {
                return redirect()->guest('/admin');
            }

            if ($user instanceof User && $user->type !== \UserType::SUPER_ADMIN) {
                // User check-in
            }
        }
        return $next($request);
    }
}
