<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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

Route::get('/insert', function(){
    $user=User::findOrFail(1);
    $post=new Post([
        'title'=>'First Post Title',
        'body'=>'First Post Body'
    ]);
    $user->posts()->save($post);
});

Route::get('/read', function () {
    $user=User::findOrFail(1);
    foreach($user->posts as $post){
        echo $post->title . '<br>';
    }
});

Route::get('/update', function () {
    $user=User::findOrFail(1);
    $user->posts()->where('id','2')->update([
        'title'=>'Post Title',
        'body'=>'Post Body'
    ]);
});

Route::get('/delete', function () {
    $user=User::findOrFail(1);
    $user->posts()->where('id','3')->delete();
});
