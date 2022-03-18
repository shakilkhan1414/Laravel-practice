<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;

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

Route::get('/about', function () {
    $names=['shakil','naeem','opu','dipto'];
    return view('about',compact('names'));
});

Route::resource('photos', PhotoController::class);

Route::resource('post', PostController::class);

Route::get('/contact/{id}',[PostController::class,'contact']);

// Route::get('/post', 'PostController@index');


Route::get('/insert',function(){
    DB::insert('insert into posts(name,content) values(?,?)',['post2','post content2']);
    return '<h1>Inserted</h1>';
});

Route::get('/read',function(){
    $result=DB::select('select * from posts where id=?',['1']);

    foreach($result as $post){
        return '<h1>'.$post->name.'</h1>';
    }
});

Route::get('/update',function(){
    DB::update('update posts set name = "updated name" where id = ?', ['1']);
    return '<h1>Updated</h1>';
});

Route::get('/delete',function(){
    DB::delete('delete from posts where id = ?', ['3']);
    return '<h1>Deleted</h1>';
});

Route::get('/readpost',function(){
    $result=Post::all();
    return $result;
});

Route::get('/findpost',function(){
    $result=Post::find(2);
    return $result->name;
});

Route::get('/findwhere',function(){
    $result=Post::where('id','2')->orderBy('id','desc')->take(1)->get();
    return $result;
});

Route::get('/findmore',function(){
    $result=Post::where('users_count', '<',50)->firstOrFail();
    return $result;
});

Route::get('/insertpost',function(){
    $post=new Post;
    $post->name='New post';
    $post->content='New post Content';
    $post->save();
    return '<h1>Inserted</h1>';
});

Route::get('/updatepost',function(){
    $post=Post::find(1);
    $post->name='New post';
    $post->content='New post Content';
    $post->save();
    return '<h1>Updated</h1>';
});

Route::get('/createpost',function(){
    Post::create([
        'name'=>'Create post',
        'content'=>'Create Content'
    ]);
    return '<h1>Created</h1>';
});

Route::get('/updatepost2',function(){
    Post::where('id',2)->update([
        'name'=>'new new name',
        'content'=>'new new content'
    ]);
    return '<h1>Updated</h1>';
});

Route::get('/deletepost',function(){
    $post=Post::find(5);
    $post->delete();
    return '<h1>Deleted</h1>';
});

Route::get('/deletepost2',function(){
    Post::destroy(13);
    // Post::destroy([4,5]);
    return '<h1>Deleted</h1>';
});

Route::get('/deletetrash',function(){
    Post::find(4)->delete();
    // Post::destroy([4,5]);
    return '<h1>Deleted</h1>';
});

Route::get('/readsoftdelete',function(){
    $post=Post::withTrashed()->where('id',4)->get();
    // $post=Post::onlyTrashed()->where('id',4)->get();
    return $post;
});

Route::get('/restore',function(){
    Post::withTrashed()->where('id',4)->restore();
    return '<h1>Restored</h1>';
});

Route::get('/forcedelete',function(){
    Post::withTrashed()->where('id',13)->forceDelete();
    return '<h1>Restored</h1>';
});

Route::get('/posts/{id}',function($id){
    // return User::find($id)->post;
    return User::find($id)->post->name;
});

Route::get('/posts/{id}/user',function($id){
    return Post::find(2)->user->name;
    // return Post::find(2)->user()->get();
});

Route::get('/posts',function(){
    $user=User::find(1);
    foreach($user->posts as $post){
        echo $post->name . "<br>";
    }
});

Route::get('/user/role/{id}',function($id){
    $user=User::find($id);
    foreach ($user->roles as $role) {
        return $role->name;
    }
});

Route::get('/user/pivot',function(){
    $user=User::find(1);
    foreach ($user->roles as $role) {
        echo $role->pivot->created_at;
    }
});

Route::get('/user/country',function(){
    $country=Country::find(1);
    foreach($country->posts as $post){
        echo $post->name;
    }
});

Route::get('/user/photo',function(){
    $user=User::find(1);
    foreach($user->photos as $photo){
        return $photo;
    }
});

Route::get('/photo/post',function(){
    $post=Post::find(2);
    foreach($post->photos as $photo){
        return $photo;
    }
});

Route::get('/photo/{id}/user',function($id){
    $photo=Photo::findOrFail($id);
    return $photo->imageable;

});

Route::get('/post/tags/list',function(){
    $post=Post::find(1);
    foreach($post->tags as $tag){
        echo $tag;
    }
});
Route::get('/tag/post',function(){
    $tag=Tag::find(2);
    foreach($tag->posts as $post){
        echo $post;
    }
});

