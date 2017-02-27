<?php

namespace App\Http\Controllers;

#use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function dologin()
    {
        # 接收用户名、密码、验证码、是否保持登录
        $username = Input::get('username');
        $password = Input::get('password');
        $captcha = Input::get('captcha');
        #has判断是否存在参数 checkbox
        $remember = Input::has('remember');
//        var_dump($username, $password, $captcha, $remember);
        #验证
        $validator = Validator::make([
            'username' => $username,
            'password' => $password,
            'captcha' => $captcha,
        ], [
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'captcha'
        ]);
        if ($validator->fails()) {
            #验证失败
            return redirect()->to('/login');
        } else {
            #验证成功
            if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
                #登录成功
                return redirect()->to('/');
            } else {
                #登录失败
                return redirect()->to('/login');
            }
        }

    }
}
