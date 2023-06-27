<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('admin.user.user');
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
