<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class RoleController extends Controller
{
        
    public function role(RoleRequest $request)
    {
        // Checking the input from view
        $credentials = $request->only('email', 'password');

        // Auth::attempt is logging in the credentials
        if (Auth::attempt($credentials)) {
            // If credentials passsed, that is who is currenly logged in
            $user = Auth::user(); 
            
            // checks who is currently logged in
            if ($user->role->name === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role->name === 'manager') {
                return redirect()->route('manager.dashboard');
            }
            
            // log out if roles not matched
            Auth::logout();
            return back()->with('error', 'Role not recognized.');
        }

        
        return back()->with('error', 'Invalid credentials!');
    }
   
}
