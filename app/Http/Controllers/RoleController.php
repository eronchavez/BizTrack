<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\User;

class RoleController extends Controller
{
    
    public function role(RoleRequest $request)
    {
        $email = $request->email;
        $user = User::where('email',$email)->first();

        echo "hello world";
    }

   
}
