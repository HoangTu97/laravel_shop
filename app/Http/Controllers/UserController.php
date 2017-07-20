<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function getAdd() {
      if(Auth::check()) {
          return view('admin.user.add');
      } else {
        return redirect()->route('getLogin');
      }
    }

    public function postAdd(UserRequest $request) {
      if(Auth::check()) {
        $user = new User();
        $user->username = $request->txtUser;
        $user->password = Hash::make($request->txtPass);
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->route('admin.user.getList')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Add User']);
      } else {
        return redirect()->route('getLogin');
      }
    }

    public function getEdit($id) {
      if(Auth::check()) {
        $data = User::find($id);
        if((Auth::user()->id != 1) && ($id == 1 || ($data['level'] == 1 && (Auth::user()->id != $id)))) {
          return redirect()->route('admin.user.getList')->with(['flash_level'=>'danger', 'flash_message'=>'Sorry !!! You Can\'t Access Edit User']);
        }
        return view('admin.user.edit', compact('data','id'));
      } else {
        return redirect()->route('getLogin');
      }
    }

    public function postEdit($id, Request $request) {
      if(Auth::check()) {
        $user = User::find($id);
        if($request->input('txtPass')) {
          $this->validate($request,
            ['txtRePass'=>'same:txtPass'],
            ['txtRePass.same'=>'Two Password Don\'t Match']
          );
          $pass = $request->input('txtPass');
          $user->password = Hash::make($pass);
        }
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect()->route('admin.user.getList')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Update User']);
      } else {
        return redirect()->route('getLogin');
      }
    }

    public function getList() {
      if(Auth::check()) {
        $user = User::select('id', 'username', 'level')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.user.list', compact('user'));
      } else {
        return redirect()->route('getLogin');
      }
    }

    public function getDelete($id) {
      if(Auth::check()) {
        $user_current_login = Auth::user()->id;
        $user = User::find($id);
        if(($id == 1) || ($user_current_login != 1 && $user['level'] == 1)) {
          return redirect()->route('admin.user.getList')->with(['flash_level'=>'danger', 'flash_message'=>'Sorry !!! You Can\'t Access Delete User']);
        } else {
          $user->delete($id);
          return redirect()->route('admin.user.getList')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Delete User']);
        }
      } else {
        return redirect()->route('getLogin');
      }
    }
}
