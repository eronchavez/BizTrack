<?php

namespace App\Http\Middleware;

use App\Http\Requests\RoleRequest;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(RoleRequest $request, Closure $next, $role): Response
    {
        /**
         * auth is who is currently logged in user is my user table 
         * in my database role is the role_id in my user table which is the foreign key
         * for my Role in Parent Table
         * 
         * auth() -> Who is currently Logged In
         * auth()->user = show the table user row.
         * auth()->user->role = since I have id email password role_id the role triggers the role_id 
         * which is in parent table Role , id 1 = admin and id 2 = manager
         * 
        */
        if(auth()->user->role->name !== $role)
        {
            return abort(403, 'Unauthorized Action');
        }
        
        // No issues found — pass the request to the next middleware or controller
        return $next($request);
    }
}
