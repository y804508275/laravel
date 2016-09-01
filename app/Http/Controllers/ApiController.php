<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function mainApi()
    {
        $list = DB::table('activities')->where('show','显示')->where('top','yes')->orderBy('addTime','desc')->take(5)->get();
        $i = 0;
        foreach( $list as $res )
        {
            $arrayName = array('title' => $res->title, 'price' => $res->price,'image' => $res->image,'place' => $res->place,'activityId' => $res->activityId);
            $result[$i] = $arrayName;
            $i ++;
        }
        $info['list'] = $result;

        $city = DB::table('cities')->get();


        $wuhan = array('cityName' => '武汉', 'cityTitle' => '','imageUrl' => 'http://123.207.101.166/upload/images/wuhan.jpg');
        $cityRes[0] = $wuhan;
        $guangzhou = array('cityName' => '广州', 'cityTitle' => '','imageUrl' => 'http://123.207.101.166/upload/images/guangzhou.jpg');
        $cityRes[1] = $guangzhou;

        $info['city'] = $cityRes;

        $kind = DB::table('kinds')->get();
        $x = 0;
        foreach( $kind as $k )
        {
            $arrayName = array('title' => $k->kindName,'kindId' => $k->kindId);
            $kindRes[$x] = $arrayName;
            $x ++;
        }
        $info['kind'] = $kindRes;

        $scroll = DB::table('banners')->orderBy('topTime','desc')->get();
        $j = 0;
        foreach( $scroll as $re )
        {
            $arrayScroll = array('image' => $re->image, 'url' => $re->url);
            $scr[$j] = $arrayScroll;
            $j ++;
        }
        $info['scroll'] = $scr;
        return $info;
//        return view('ios.main')->with('info',$info);
    }
    public function findApi()
    {
        $kind = DB::table('kinds')->get();
        $x = 0;
        foreach( $kind as $k )
        {
            $arrayName = array('title' => $k->kindName,'kindId' => $k->kindId);
            $kindRes[$x] = $arrayName;
            $x ++;
        }
        $info['kind'] = $kindRes;
        $theme = DB::table('themes')->get();
        $x = 0;
        foreach( $theme as $th )
        {
            $arrayTheme = array('title' => $th->title,'image' => $th->image,'themeId' => $th->themeId);
            $themeRes[$x] = $arrayTheme;
            $x ++;
        }
        $info['topic'] = $themeRes;
        return $info;
    }
    public function activity($id)
    {
        $info = DB::table('activities')->where('activityId',$id)->get();
        foreach( $info as $in )
        {
            $arrayInfo = array( 'title' => $in->title,
                                'image' => $in->image,
                                'price' => $in->price,
                                'minNum' => $in->minNum,
                                'maxNum' => $in->maxNum,
                                'date' => $in->date,
                                'time' => $in->time,
                                'details' => $in->details,
                                'tips' => $in->tips
                );
            $result['result'] = $arrayInfo;
        }
        return $result;
    }
    public function theme($themeId)
    {
        $result = DB::table('themes')->where('themeId',$themeId)->get();
        foreach ($result as $res)
            $activities = $res->activities;
        $activities = explode(",", $activities);
        $i = 0;
        foreach( $activities as $activityId )
        {
            $activity = DB::table('activities')->where('activityId',$activityId)->get();
            foreach ($activity as $ac)
                $list[$i] = $ac;
            $i++;
        }
        $info['list'] = $list;
        return $info;
//        $list = DB::table('activities')->where('kindId',$kindId)->get();
//        $re['list'] = $list;
//        return $re;
    }
    public function kind($name)
    {
        $result = DB::table('kinds')->where('kindName',$name)->get();
        foreach ($result as $res)
            $kindId = $res->kindId;
        $list = DB::table('activities')->where('kindId',$kindId)->orderBy('addTime','desc')->get();
        $re['list'] = $list;
        return $re;
    }
    public function city($name)
    {
        $list = DB::table('activities')->where('city',$name)->orderBy('addTime','desc')->get();
        $re['list'] = $list;
        return $re;
    }
    public function showActivity($id)
    {
        $result = DB::table('activities')->where('activityId',$id)->get();
        return view('ios.activity')->with('result',$result);
    }
    public function allList($number)
    {
        $list = DB::table('activities')->where('show','显示')->orderBy('addTime','desc')->take($number)->get();
        $re['list'] = $list;
        $all = DB::table('activities')->where('show','显示')->get();
        $allNum = count($all);
        $listNum = count($list);
        if ($listNum == $allNum)
        {
            $ifAll = 'yes';
        }
        else
        {
            $ifAll = 'no';
        }
        $re['all'] = $ifAll;
        return $re;
    }
}
