<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function index()
    {
        $city = DB::table('cities')->get();
        $list = DB::table('activities')->where('top','yes')->orderBy('addTime','desc')->take(3)->get();
        $result['city'] = $city;
        $result['list'] = $list;
        return view('main.index')->with('result',$result);
    }

    public function showAll()
    {
        $kind = DB::table('kinds')->get();
        $list = DB::table('activities')->where('show','显示')->orderBy('addTime','desc')->get();
        $result['kind'] = $kind;
        $result['list'] = $list;
        return view('main.list')->with('result',$result);
    }
    public function showList($id)
    {
        $kind = DB::table('kinds')->get();
        $list = DB::table('activities')->where('kindId',$id)->where('show','显示')->orderBy('addTime','desc')->get();
        $result['kind'] = $kind;
        $result['list'] = $list;
        return view('main.list')->with('result',$result);
    }
    public function showCity($city)
    {
        $kind = DB::table('kinds')->get();
        $list = DB::table('activities')->where('city',$city)->where('show','显示')->orderBy('addTime','desc')->get();
        $result['kind'] = $kind;
        $result['list'] = $list;
        return view('main.list')->with('result',$result);
    }
    public function activity($id)
    {
        $result = DB::table('activities')->where('activityId',$id)->get();
        return view('main.activity')->with('result',$result);
    }
}
