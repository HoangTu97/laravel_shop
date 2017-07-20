<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Auth;
use App\User;
use Hash;

class AuthController extends Controller
{
  public function getLogin() {
    return view('admin.login');
  }

  public function postLogin(LoginRequest $request) {
    $login = array(
      'username'=>$request->username,
      'password'=>$request->password,
      'level'=>1
    );
    if(Auth::attempt($login)) {
      return redirect()->route('admin.cate.getList');
    } else {
      return redirect()->back();
    }
  }

  public function getLogout() {
    Auth::logout();
    return redirect()->route('getLogin');
  }

  public function getRegister() {
    return view('admin.register');
  }

  public function postRegister(RegisterRequest $request) {
      $user = new User();
      $user->username = $request->txtUsername;
      $user->password = Hash::make($request->txtPassword);
      $user->email = $request->txtEmail;
      $user->level = 2;
      $user->remember_token = $request->_token;
      $user->save();
      return redirect()->route('getLogin');
  }
}
