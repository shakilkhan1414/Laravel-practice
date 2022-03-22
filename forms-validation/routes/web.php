<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Carbon\Carbon;
use App\Models\User;

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

Route::group(['middleware'=>'web'],function(){
    Route::resource('/posts', PostsController::class);
});

Route::get('/date', function () {
    $date= new DateTime();
    echo $date->format('d-m-Y');

    echo '<br>';

    $date=Carbon::now();
    echo $date;

    echo '<br>';

    $date=Carbon::now()->addDays(5)->diffForHumans();
    echo $date;

    echo '<br>';

    $date=Carbon::now()->subMonths(5)->diffForHumans();
    echo $date;

    echo '<br>';

    $date=Carbon::now()->yesterday()->diffForHumans();
    echo $date;


});

Route::get('/getname', function () {
    $user=User::find(1);
    echo $user->name;
});

Route::get('/setname', function () {
    $user=User::find(1);
    $user->name='Md Shakil Khan';
    $user->save();
});
