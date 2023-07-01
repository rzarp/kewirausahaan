<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{
    public function index() {
        $data['user'] = User::where('id', '!=', Auth::id())->get();
        $data['role'] = ['0','1']; 


        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.user.user',$data);
    }

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


        // dd(request()->all());
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

    public function edit($id) {
        $user = User::find($id);

        
        return $user;
    }

    public function update(Request $request, $id) {

        // return $request;
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return redirect(route('user.insert'))->with('pesan' , 'Data berhasil disimpan');
    }

    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();       
        return redirect()->back();
    }
}
