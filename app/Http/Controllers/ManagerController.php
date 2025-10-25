<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class ManagerController extends Controller
{
    //
    public function index()
   {
         return view('manager.dashboard');
   }

   public function list()
   {

      /**
       * I should get the manager only, not including the admin itself.
       * 
       *Role and User is different table.
       *I must get the manager role only but in User table.
       * 
       */


      $list = User::whereHas('role', function ($query) {
            $query->where('name', 'manager');
      })->get();

    return view('admin.index', compact('list'));
}

}