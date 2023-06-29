<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index() {
        $data['user'] = User::all();
        $data['role'] = ['0','1']; 
        return view('admin.user.user',$data);
    }

    // public function create() {
    //     $data['user'] = User::all();
    //     $data['role'] = ['0','1']; 
    //     return view('admin.user.user',$data);
    // }

    public function store (Request $request) 
    {
        $request->validate([
            'id' => Str::uuid()->toString(),
            'name' => 'required',
            'username' => 'required',
            'email' => 'email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect(route('user.insert'))->with('pesan' , 'Data berhasil disimpan');
        
    }

    public function changeUserStatus($id) {
        $user = User::find($id);
        if ($user != null) {
            $user->status_user = !$user->status_user;
            $user->save();
        }

        if ($user->status_user == 1) {
            Alert::success('Success', 'User has been activated');
        }else {
            Alert::success('Success', 'User has been deactivated');
        }
        return redirect()->back();
    }
}
