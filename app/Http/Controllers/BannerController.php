<?php

namespace App\Http\Controllers;

use App\RandomId;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BannerController extends Controller
{
    private $imgUrl = 'http://localhost:8000/';
    public function index()
    {
        session_start();
        if (isset($_SESSION['login']))
        {
            $result = DB::table('banners')->orderBy('topTime','desc')->get();
            return view('admin.banner')->with('results',$result);
        }
        else
        {
            return '<script>location.href="/admin/login"</script>';
        }

    }
    public function add()
    {
        return view('admin.bannerAdd');
    }
    public function addSubmit(Request $request)
    {

        $file = $request -> file('image');
        $path = 'upload/images/';
        $extension = $file -> getClientOriginalExtension();
        $nameStr = RandomId::create(10);
        $newName = $nameStr.'.'.$extension;
        $file -> move($path,$newName);
        $img = $this->imgUrl.$path.$newName;

        $input = $request->all();
        $data['title'] = $input['title'];
        $data['image'] = $img;
        $data['url'] = $input['url'];
        $data['topTime'] = time();
        $data['bannerId'] = RandomId::create(8);
        DB::table('banners')->insert($data);
        return '<script>location.href="/admin/banner"</script>';
    }
    public function edit($id)
    {
        session_start();
        if (isset($_SESSION['login']))
        {
            $result = DB::table('banners')->where('bannerId',$id)->get();
            return view('admin.bannerEdit')->with('result',$result);
        }
        else
        {
            return '<script>location.href="/admin/login"</script>';
        }
    }
    public function editSubmit(Request $request)
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
        $input = $request->all();
        $data['title'] = $input['title'];
        $data['url'] = $input['url'];
        $data['topTime'] = time();
        DB::table('banners')->where('bannerId',$input['bannerId'])->update($data);
        return '<script>location.href="/admin/banner"</script>';
    }
    public function del(Request $request)
    {
        $input = $request->all();
        $bannerId = $input['bannerId'];
        DB::table('banners')->where('bannerId',$bannerId)->delete();
        return '<script>location.href="/admin/banner"</script>';
    }
    public function top($id)
    {
        $data['topTime'] = time();
        DB::table('banners')->where('bannerId',$id)->update($data);
        return '<script>location.href="/admin/banner"</script>';
    }
}
