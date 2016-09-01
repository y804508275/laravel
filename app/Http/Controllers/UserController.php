<?php

namespace App\Http\Controllers;

use App\RandomId;
use App\top\request\AlibabaAliqinFcSmsNumQueryRequest;
use App\top\request\AlibabaAliqinFcSmsNumSendRequest;
use App\top\TopClient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Autoloader;


class UserController extends Controller
{
    private $imgUrl = 'http://123.207.101.166/';
    public function signUp(Request $request)
    {
        $input = $request->all();
        $password = $input['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
//        $pass = '456';
//        if (password_verify($pass, $hash)) {
//            $data['res'] = 'resYes';
//        }
//        else {
//            $data['res'] = 'resNo';
//        }
        $data['password'] = $hash;
        $data['telephone'] = $input['telephone'];
        $result = DB::table('users')->where('telephone',$input['telephone'])->get();
        if ($result == [])
        {
            $username = '有趣的人'.RandomId::create(10);
            $data['username'] = $username;
            $data['image'] = 'http://localhost:8000/upload/user/head/head.jpg';
            DB::table('users')->insert($data);
            $res['result'] = 'success';
            $res['info'] = $data;
        }
        else
        {
            $res['result'] = '账号已存在';
        }
        return $res;


    }
    public function signIn(Request $request)
    {
        $input = $request->all();
        $telephone = $input['username'];
        $password = $input['password'];
        $result = DB::table('users')->where('telephone',$telephone)->get();
        if ($result == [])
        {
            $data['result'] = 'fail';
        }
        else
        {
            foreach( $result as $res )
            {
                $info = $res;
                $pass = $res->password;
            }
            if (password_verify($password, $pass)) {
                $data['result'] = 'success';
                $data['info'] = $info;
            }
            else
            {
                $data['result'] = 'fail';
            }
        }


        return $data;
    }
    public function set(Request $request)
    {
        if ($request -> file('image'))
        {
            $file = $request -> file('image');
            $path = 'upload/images/';
            $extension = $file -> getClientOriginalExtension();
            $nameStr = RandomId::create(10);
            $newName = $nameStr.'.'.$extension;
            $file -> move($path,$newName);

            $img = $this->imgUrl.$path.$newName;
            $data['image'] = $img;
        }
        $data['telephone'] = '00';
//        $input = $request->all();
//        $data['username'] = $input['username'];
//        $data['sex'] = $input['sex'];
//        DB::table('users')->where('telephone',$input['telephone'])->update($data);
        DB::table('users')->insert($data);

        $res['res'] = 'ok';
        return $res;
    }
    public function ceshi(Request $request)
    {
        if ($request -> file('file'))
        {
            $file = $request -> file('file');
            $path = 'upload/user/head/';
            $extension = $file -> getClientOriginalExtension();
            $nameStr = RandomId::create(10);
            $newName = $nameStr.'.'.'jpg';
            $file -> move($path,$newName);

            $img = $this->imgUrl.$path.$newName;
            $data['image'] = $img;
            $data['imageName'] = $newName;

        }
        $telephone = $file->getClientOriginalName();
        $res = DB::table('users')->where('telephone',$telephone)->get();
        foreach ($res as $re)
        {
            $oldImage = $path.$re->imageName;
            if ($oldImage != '')
                unlink($oldImage);
        }
        DB::table('users')->where('telephone',$telephone)->update($data);


        return $data['image'];
    }
    public function sms($tel)
    {
        $appkey = '23445896';
        $secret = 'ffec660b7d173572ffcda85c1b514965';
        $c = new TopClient;
        $c->appkey = $appkey;
        $c->secretKey = $secret;
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("阿里大于");
        $req->setSmsParam("{\"check\":\"1234\"}");
        $req->setRecNum("13163234562");
        $req->setSmsTemplateCode("SMS_14030063");
        $resp = $c->execute($req);
        return 'ok';
    }
}
