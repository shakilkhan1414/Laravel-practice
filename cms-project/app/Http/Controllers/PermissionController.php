<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index(){
        $permissions=Permission::all();
        return view('permission.index',compact('permissions'));
    }

    public function store(){
        $inputs=request()->validate([
            'name'=>'required'
        ]);

        $slug=Str::lower(request('name'));
        $inputs['slug']=Str::replace(" ","-",$slug);

        Permission::create($inputs);
        return back();
    }

    public function destroy(Permission $permission){
        session()->flash('permission-delete','Permission deleted!');
        $permission->delete();
        return back();
    }

}
