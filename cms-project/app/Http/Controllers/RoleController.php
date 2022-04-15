<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show(User $user){
      $roles=Role::all();
      return view('user.roles',compact('roles','user'));
    }
}
