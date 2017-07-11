<?php

namespace App\Http\Middleware;

use Closure;

class OwnerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role1, $role2, $role3)
    {
        if ($request->user() === null) {
            return redirect('/');
        }
        $u1 = $request->user()->hasRole($role1);
        $u2 = $request->user()->hasRole($role2);
        $u3 = $request->user()->hasRole($role3);
        if ( ($u1) || ($u2) || ($u3) ){

            return $next($request);

        } else if ((($u1 == false) && ($u2)) && ($u3)) {

            return $next($request);

        } elseif ((($u1 == false) && ($u2 == false)) && ($u3)) {

            return $next($request);

        } else {

            return redirect('/');

        }

    }
}
