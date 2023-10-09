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
        $data['role'] = ['user' ,'admin'];


        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);

        return view('admin.user.user',$data);
    }

    public function store (Request $request)
    {
        $request->validate([
            'id' => Str::uuid()->toString(),
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
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

        if ($user->save()) {
            Alert::success('Success', 'Data Berhasil Simpan');
        } else {
            Alert::error('Error', 'Data Tidak Tersimpan');
        }


        // dd(request()->all());
        return redirect(route('user.insert'));


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

    // public function update(Request $request, $id) {

    //     // return $request;
    //     DB::table('users')
    //         ->where('id', $id)
    //         ->update([
    //             'name' => $request->name,
    //             'username' => $request->username,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //             'role' => $request->role,
    //         ]);

    //         if ($user->save()) {
    //             Alert::success('Success', 'Data Berhasil Simpan');
    //         } else {
    //             Alert::error('Error', 'Data Tidak Tersimpan');
    //         }


    //         return redirect(route('user.insert'))->with('pesan' , 'Data berhasil disimpan');
    // }

    public function update(Request $request, $id) {
    try {
        $user = User::find($id);

        if (!$user) {
            Alert::error('Error', 'User not found');
            return redirect()->back();
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        if ($user->save()) {
            Alert::success('Success', 'Data Berhasil Disimpan');
            return redirect(route('user.insert'))->with('pesan', 'Data berhasil disimpan');
        } else {
            Alert::error('Error', 'Data Tidak Tersimpan');
            return redirect()->back();
        }
    } catch (\Exception $ex) {
        Alert::error('Error', 'An error occurred. Please try again later.');
        return redirect()->back();
    }
}


    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();

        if ($user->delete()) {
            Alert::success('Success', 'Data Berhasil Dihapus');
        } else {
            Alert::error('Error', 'Data Tidak terhapus');
        }

        return redirect()->back();
    }


    public function trash() {
        $restore = User::onlyTrashed()->get();
        return view('admin.user.restore',compact('restore'));
    }

    public function restore($id = null) {
        if ($id != null) {
            $restore = User::onlyTrashed()->get()
                ->where('id', $id)
                ->restore();
        }else {
            $restore = User::onlyTrashed()->restore();
        }

        return redirect(route('trash.user'))->with('pesan' , 'Data berhasil restore');
    }


    public function setting_edit() {
        return view('admin.user.setting', [
            'user' => User::findOrFail(auth()->user()->id)
        ]);
    }

    public function setting_update(Request $request) {

        // dd($request);
        $id = auth()->user()->id;

        $request->validate([
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|email',
            'foto '     => 'image|mimes:jpeg,png,gif|max:3000',
        ]);


        if (isset($request->foto)) {
            $request->validate ([
                'foto '         => 'nullable',
            ]);
                if($request->hasFile('foto')) {
                    $extFile = $request->foto->getClientOriginalExtension();
                    $namaFile = 'foto-'.time().".".$extFile;
                    $foto = $request->foto->move('img/user', $namaFile);
                }
        }

        $data = [
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'foto'  => (isset($foto) ? $foto : auth()->user()->foto)

        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user = User::where('id', $id)->update($data);

        if ($user) {
            Alert::success('Success', 'Data Berhasil Simpan');
        } else {
            Alert::error('Error', 'Data Tidak Tersimpan');
        }

        return redirect()->back();
    }
}
