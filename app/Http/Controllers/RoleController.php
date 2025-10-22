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
       
      
        $userRole = $user->role->name;
        
        

        // Condition to determine if the user is admin or manager.
        if(!$user){
            return back()->with('error' , 'Invalid credentials!');
            
        }

        switch($userRole)
        {
            case 'admin':
                 return redirect()->route('admin.dashboard');
            case 'manager' :
                 return redirect()->route('manager.dashboard');
            default :
                return redirect()->route('role');
        }

       


    }

   
}
