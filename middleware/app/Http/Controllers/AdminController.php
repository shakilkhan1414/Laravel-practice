<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }
    public function index(Request $request){
        $request->session()->put([
            'name'=>'Shakil Khan'
        ]);
        session(['course'=>'Laravel']);
        // echo session('course');

        // return $request->session()->all();
        // return $request->session()->get('name');
        $request->session()->forget('course');
        // $request->session()->flash('message','Post created');
        // $request->session()->reflash();
        // $request->session()->keep('message');
        // $request->session()->flush();

        return $request->session()->all();
    }
}
