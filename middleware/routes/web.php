<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

    echo 'Home';
    // $user=Auth::user();
    // $user=User::find($user->id);
    // if($user->isAdmin()){
    //     echo 'Role is Admin';
    // }
    // else{
    //     echo 'Role is Subscriber';
    // }
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/role', ['middleware'=>'IsAdmin',function () {
    return 'ok';
}]);

Route::get('/admin',[AdminController::class,'index']);
