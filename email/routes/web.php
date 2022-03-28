<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('/email',function(){
    $data=[
        'title'=>'Mail Title',
        'content'=>'Mail Content'
    ];
    Mail::send('emails.test',$data,function($message){
        $message->to('khan.shakil.1414@gmail.com','Shakil Khan')->subject('Email from Laravel');
    });
});

//composer require symfony/mailgun-mailer symfony/http-client
