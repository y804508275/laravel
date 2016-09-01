<?php

namespace App\Http\Controllers;

use App\RandomId;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    private $imgUrl = 'http://123.207.101.166/';
    public function index()
    {
        $result = DB::table('themes')->get();
        return view('admin.theme')->with('result', $result);
    }

    public function add()
    {
        return view('admin.themeAdd');
    }

    public function addSubmit(Request $request)
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
        $data['themeId'] = RandomId::create(8);
        DB::table('themes')->insert($data);
        return '<script>location.href="/admin/theme"</script>';
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
        $themeId = $input['themeId'];
        $checkbox = $input['activity'];
//        echo $checkbox;
//        $activities = json_encode($checkbox,JSON_UNESCAPED_UNICODE);
//        $data['activities'] = $activities;
        $activities = implode(',',$checkbox);
        $data['activities'] = $activities;

        DB::table('themes')->where('themeId',$themeId)->update($data);
        return '<script>location.href="/admin/theme"</script>';
    }
    public function themeDelete(Request $request)
    {
        $input = $request->all();
        $id = $input['themeId'];
        DB::table('themes')->where('themeId',$id)->delete();
        return '<script>location.href="/admin/theme"</script>';
    }
    public function edit($id)
    {
        $themes = DB::table('themes')->where('themeId',$id)->get();
        $activities = DB::table('activities')->get();
        $result['themes'] = $themes;
        $result['activities'] = $activities;

        return view('admin.themeEdit')->with('result',$result);
    }
}
