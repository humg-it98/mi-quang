<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use MongoDB\Driver\Session;

class LoginSocialController extends Controller
{
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook(): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $user = Socialite::driver('facebook')->user();
            $userExists = $this->userExists($user->getEmail());
            if($userExists == null) {
                $saveUser = User::create([
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'password' => Hash::make('12345678'),
                    'phone' => null,
                    'avatar' => $user->avatar,
                ]);
                Auth::login($saveUser);
            } else {
                Auth::login($userExists);
            }
            DB::commit();
            toastr()->success('Xin chào: ' . Auth::user()->name .'!');
            return redirect()->route('admin.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Lỗi : ".$e->getMessage()."Dòng : ".$e->getLine());
        }
    }

    public function loginUsingGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackFromGitHub()
    {
        try {
            DB::beginTransaction();
            $user = Socialite::driver('github')->user();
            $userExists = $this->userExists($user->getEmail());
            if($userExists == null) {
                $saveUser = User::create([
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'password' => Hash::make('12345678'),
                    'phone' => null,
                    'avatar' => $user->avatar,
                ]);
                Auth::login($saveUser);
            } else {
                Auth::login($userExists);
            }
            DB::commit();
            toastr()->success('Xin chào: ' . Auth::user()->name .'!');
            return redirect()->route('admin.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Lỗi : ".$e->getMessage()."Dòng : ".$e->getLine());
        }
    }

    public function loginUsingGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            DB::beginTransaction();
            $user = Socialite::driver('google')->user();
            $userExists = $this->userExists($user->getEmail());
            if($userExists == null) {
                $saveUser = User::create([
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'password' => Hash::make('12345678'),
                    'phone' => null,
                    'avatar' => $user->avatar,
                ]);
                Auth::login($saveUser);
            } else {
                Auth::login($userExists);
            }
             DB::commit();
            toastr()->success('Xin chào: ' . Auth::user()->name .'!');
            return redirect()->route('admin.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Lỗi : ".$e->getMessage()."Dòng : ".$e->getLine());
        }
    }

    public function loginUserUsingGoogle()
    {
        return Socialite::driver('google-user')->redirect();
    }

    public function callbackUserFromGoogle()
    {
        try {
            DB::beginTransaction();
            $user = Socialite::driver('google-user')->user();
            $userExists = $this->CutomerExists($user->getEmail());
            if($userExists == null) {
                $saveUser = Customer::create([
                    'cus_email' => $user['email'],
                    'cus_name' => $user['name'],
                    'password' => md5('12345678'),
                ]);
                \Illuminate\Support\Facades\Session::put('cus_id',$saveUser->id);
                toastr()->success('Bạn tên: ' . $saveUser['cus_name'] .' đã đăng nhập thành công!');
                return redirect()->route('home.index');
            } else {
                \Illuminate\Support\Facades\Session::put('cus_id',$userExists->id);
                toastr()->success('Bạn tên: ' . $userExists['cus_name'] .' đã đăng nhập thành công!');
                return redirect()->route('home.index');
            }
            DB::commit();
            \Illuminate\Support\Facades\Session::save();
            toastr()->success('Xin chào: ' . Auth::user()->name .'!');
            return redirect()->route('admin.index');
        } catch (\Exception $e) {
            DB::rollBack();
            echo ("Lỗi : ".$e->getMessage()."Dòng : ".$e->getLine());
        }
    }


    protected function userExists($user)
    {
        return User::where('email', $user)->first();
    }

    protected function CutomerExists($user)
    {
        return Customer::where('cus_email', $user)->first();
    }
}
