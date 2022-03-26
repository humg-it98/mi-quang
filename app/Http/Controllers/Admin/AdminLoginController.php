<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\loginAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function loginAuth()
    {
        return view('admin.auth.login');
    }

    public function postLoginAdmin(loginAuthRequest $request)
    {
        $loginInfo = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt($loginInfo, $remember)) {
            toastr()->success('Xin chào: ' . Auth::user()->name .'!');
            return redirect()->to('admin-miquang');
        } else {
            toastr()->error('Email hoặc mật khẩu sai.');
            return redirect()->back();
        }
    }

    public function logoutAdmin(Request  $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->info('Success Logout');
        return redirect()->route('login');
    }
}
