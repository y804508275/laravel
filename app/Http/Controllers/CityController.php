<?php

namespace App\Http\Controllers;

use App\city;
use App\RandomId;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        $result = DB::table('kinds')->get();
        session_start();
        if (isset($_SESSION['login']))
        {
            $result = DB::table('cities')->get();
            return view('admin.city')->with('result',$result);
        }
        else
        {
            return '<script>location.href="/admin/login"</script>';
        }

    }
    public function addCity(Request $request)
    {
        $data["cityName"] = $request->input("cityName");
        $data["cityId"] = RandomId::create(8);
//        $data = array(
//            'cityName'=>$request["cityName"],
//            'info'=>$request['cityInfo']
//        );
        $res = DB::table('cities')->where('cityName',$data['cityName'])->get();
        if($res == []) {
            DB::table('cities')->insert($data);
        }
        //查重
//        City::create($data);
        return '<script>location.href="/admin/city"</script>';

    }
    public function editCity($id)
    {
        return '暂未开放此功能';
    }
    public function cityDelete()
    {
        return '暂未开放此功能';
    }
}
