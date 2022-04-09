<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user){
        return view('user.profile',compact('user'));
    }

    public function update(User $user){

        $inputs=request()->validate([
            'username'=> ['required','string','max:255','alpha_dash'],
            'name'=> ['required','string','max:255'],
            'email'=> ['required','email','max:255'],
            'avatar'=>['file']
        ]);

        if(request('avatar')){
            $inputs['avatar']=request('avatar')->store('images/user');
        }

        $user->update($inputs);

        session()->flash('update-user','Profile was updated!');

        return back();


    }

}