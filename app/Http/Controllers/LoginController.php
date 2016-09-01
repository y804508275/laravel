<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    /**
     * @param Request $request
     */
    public function check(Request $request)
    {
        $input = $request->all();
        $username = $input['username'];

        $result = DB::table('admins')->where('username',$username)->pluck('password');
//        return view('admin.welcome');       
        if ($result != []) {
            if ( $result[0] == $input['password']) {
                session_start();
                $_SESSION['login'] = 1;
                return view('admin.admin');
            }
            else
            {
                return view('admin.login')->with('infomation','账号或密码错误');
            }
        }
        else
        {
            return view('admin.login')->with('infomation','账号或密码错误');
        }
        
//        return $request->get('username');
    }
//    public function signUp(Request $request)
//    {
//        $input = $request->all();
//        $data['telephone'] = $input['telephone'];
//        $password = $input['password'];
//        $hash = password_hash($password, PASSWORD_DEFAULT);
//        $pass = '456';
//        if (password_verify($pass, $hash)) {
//            $data['res'] = 'resYes';
//        }
//        else {
//            $data['res'] = 'resNo';
//        }
//        $data['password'] = $hash;
//        $data['checkNum'] = $input['checkNum'];
//
//        return $data;
//    }
    public function welcome()
    {
        return view('admin.welcome');
    }
}
