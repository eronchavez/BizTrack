<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        /**
         * auth()  → Who is currently logged in
         * auth()->user() → The user record (row) from your users table
         * auth()->user()->role → Access the related role model (foreign key relationship)
         * auth()->user()->role->name → Access the name of the role from Role table
         */

        // Check if no user is logged in
        if (!Auth::check()) {
            return redirect('/login');
        }

        // If user is logged in but role doesn't match
       if (Auth::user()->role->name !== $role)
         {
            abort(403, 'Unauthorized Action');
        }

        // Continue if everything is fine
        return $next($request);
    }
}
