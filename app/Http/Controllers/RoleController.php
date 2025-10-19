<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\User;

class RoleController extends Controller
{
    
    public function role(RoleRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email',$email)->first();

        
        // Condition to determine if the user is admin or manager.
        if(!$user || $password !== $user->password){
            return back()->with('error' , 'Invalid credentials!');
        }

        if($user->role->name === 'admin')
        {
            return redirect()->route('admin.dashboard');

        }elseif($user->role->name === 'manager')
        {
            return redirect()->route('manager.dashboard');

        }else
        {
            return redirect()->route('role');
        }


    }

   
}
