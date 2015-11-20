<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;


class AdminController extends Controller
{

     public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $roles = Role::get();
        return view('admin.index', ['roles' => $roles]);
    }
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function roles(){
        return view('admin.roles');
    }

    public function createRole(){
        return view('admin.roleCreate');
    }

    public function storeRole(Request $request){
        $role = new Role();
        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        $role->description = $request->input('description');
        $role->save();

        return redirect()->back();

    }
}