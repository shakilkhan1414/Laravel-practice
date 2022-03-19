<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert',function(){
    $user=User::findOrFail(1);
    $role=new Role([
        'name'=>'Admin'
    ]);
    $user->roles()->save($role);
});

Route::get('/read',function(){
    $user=User::findOrFail(1);
    foreach ($user->roles as $role) {
        dd($role);
    }
});

Route::get('/update',function(){
    $user=User::findOrFail(1);
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name=='Admin'){
                $role->name='user';
                $role->save();
            }
        }
    }
});

Route::get('/delete',function(){
    $user=User::findOrFail(1);
    foreach($user->roles as $role){
        $role->whereId(5)->delete();
    }
});

Route::get('/attach',function(){
    $user=User::findOrFail(1);
    $user->roles()->attach(3);
});

Route::get('/detach',function(){
    $user=User::findOrFail(1);
    $user->roles()->detach(3);
});

Route::get('/sync',function(){
    $user=User::findOrFail(1);
    $user->roles()->sync([3,9]);
});
