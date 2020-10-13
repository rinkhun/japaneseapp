<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function returnViewlogin()
    {   
        if(Auth::guard('admins')->check()){
            return Redirect::route('admin.dashboard');
        }
        return view('admins.login');
    }

    public function login(Request $request)
    {
        Validator::make($request->all(), Administrator::$rule_login)->validate();

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Authentication passed...
            return Redirect::route('admin.dashboard')->with('login_success','LOGIN SUCCESS');
        }
        return Redirect::route('admin.login')->withInput(['email' => $request->email]);
    }

    public function logout()
    {
        if (Auth::guard('admins')->check()) {
            Auth::guard('admins')->logout();
            Auth::logout();

            return Redirect::route('admin.login')->with('logout_success', 'Đăng xuất thành công');
        }

        return redirect()->route('home')->withErrors(['logout' => 'không thể đăng xuất']);
    }
    public function dashboard()
    {
        return view('admins.dashboard');
    }
}
