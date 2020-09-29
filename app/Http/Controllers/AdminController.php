<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function returnViewlogin()
    {
        return view('admins.login');
    }

    public function login(Request $request)
    {
        Validator::make($request->all(),Administrator::$rule_login)->validate(); 

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Authentication passed...
            return 'Đăng nhập thành công';
        }
        return 'Đăng nhập thất bại';
    }
}
