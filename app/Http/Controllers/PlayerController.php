<?php

namespace App\Http\Controllers;

use App\Uploadr;
use App\User;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Role;
use Illuminate\Support\Facades\Storage;
use Kodeine\Acl\Models\Eloquent\Permission;


class PlayerController extends Controller
{

     public function __construct(){
        //$this->middleware('auth');
    }

    public function index(){
        $users = User::get();
        return view('player.index', ['users' => $users, 'roles' => Role::get()]);
    }


    public function add(){
        return view('player.add');
    }

    public function edit($id){

        return view('player.edit', [
            'player' => User::find($id),
            'roles' => Role::get(),
        ]);
    }

    public function update(Request $request, $id){

        $file = $request->file('My_file');
        $user = User::find($id);

        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username,'.$id,
            'nickname' => 'required|max:255|unique:users,nickname,'.$id,
            'email' => 'required_if:account,1|email|max:255|unique:users,email,'.$id,
            'password' => 'confirmed|min:6',
        ]);
        $user->username = $request->input('username');
        $user->nickname = $request->input('nickname');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');

        if( $request->has('password') ){
            $user->password =  bcrypt($request->input('password') );
        } 

        if( $file ){

            $uploadr = new \App\Uploadr;
            $path = $uploadr->upload(
                $file, 
                round($request->height),
                round($request->width),
                'user', 
                $user->id,
                round($request->offsetx),
                round($request->offsety)
            );
            $user->profile_photo = $path;
        }
        $user->revokeAllRoles();
        foreach( $request->input('roles') as $role){
            $user->assignRole($role);
        }
        $user->save();
        return redirect()->back();
        
    }

    public function store(Request $request){
        $messages = [
            'required_if' => 'The :attribute field is required.',
        ];

        $this->validate($request, [
            'username' => 'required|max:255|unique:users',
            'nickname' => 'required|max:255|unique:users',
            'email' => 'required_if:account,1|email|max:255|unique:users',
            'password' => 'required_if:account,1|confirmed|min:6',
        ], $messages);

        if( $request->has('password') ){
            $password =  bcrypt($request->input('password') );
        } else{
            $password = 'XXX';
        }
        $file = $request->file('photo');
        
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email', null),
            'password' => $password,
        ]); 
        $user->nickname = $request->input('nickname');
        

        if( $file ){
            $uploadr = new \App\Uploadr;
            $path = $uploadr->upload(
                $request->file('photo'), 
                round($request->height),
                round($request->width),
                'user', 
                'test',
                round($request->offsetx),
                round($request->offsety)
            );
            $user->profile_photo = $path;
        }
        $user->save();

        return redirect()->route('player');
        
    }
}