<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Product;
use App\Models\Photo;

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

Route::get('/insert', function () {
    $staff=Staff::find(1);
    $staff->photos()->create([
        'path'=>'example.jpg'
    ]);
});

Route::get('/read', function () {
    $staff=Staff::find(1);

    foreach($staff->photos as $photo){
        echo $photo->path;
    }
});

Route::get('/update', function () {
    $staff=Staff::find(1);
    $photo=$staff->photos()->where('id','1')->first();
    $photo->path='shakil.png';
    $photo->save();
});

Route::get('/delete', function () {
    $staff=Staff::find(1);
    $photo=$staff->photos()->whereId(7)->delete();
});

Route::get('/assign', function () {
    $staff=Staff::find(1);
    $photo=Photo::find(10);
    $staff->photos()->save($photo);
});

Route::get('/un-assign', function () {
    $staff=Staff::find(1);
    $staff->photos()->whereId(10)->update([
        'imageable_id'=>0,
        'imageable_type'=>''
    ]);
});
