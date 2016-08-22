<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\RandomId;
use Illuminate\Support\Facades\Input;


class ActivityController extends Controller
{
    private  $addId;
    private  $imgUrl = 'http://localhost:8000/';
    public function activity()
    {
        $result = DB::table('kinds')->get();
        session_start();
        if (isset($_SESSION['login']))
        {
            return view('admin.activity')->with('result',$result);
        }
        else
        {
            return '<script>location.href="/admin/login"</script>';
        }
    }
    public function addKind(Request $request)
    {
        $input = $request->all();
        $data['kindName'] = $input['kindName'];
        $data['kindId'] = RandomId::create(8);
        DB::table('kinds')->insert($data);

        $result = DB::table('kinds')->get();
//        return view('admin.activity')->with('result',$result);
//        return view('admin.activityLocation');
        return '<script>location.href="/admin/activity"</script>';
    }
    public function editKind(Request $request)
    {

        $input = $request->all();
        $id = $input['kindId'];
        $data['kindName'] = $input['kindName'];
        DB::table('kinds')->where('kindId',$id)->update($data);

        $result = DB::table('kinds')->get();
//        return view('admin.activity')->with('result',$result);
        return '<script>location.href="/admin/activity"</script>';
    }

    public function allList()
    {
        return view('admin.allList');
    }
    public function kindList($id)
    {
        session_start();
        if (isset($_SESSION['login']))
        {
            $kindId = $id;
            $result = DB::table('activities')->where('kindId',$kindId)->get();
            $kindName = DB::table('kinds')->where('kindId',$kindId)->get();
            $data['kindName'] = $kindName;
            $data['kindId'] = $kindId;
            $data['result'] = $result;
            return view('admin.kindList')->with('data',$data);
        }
        else
        {
            return '<script>location.href="/admin/login"</script>';
        }

//        return $data;
    }
    public function activityAdd($id)
    {
        session_start();
        if (isset($_SESSION['login']))
        {
            $result['kindId'] = $id;
            $city = DB::table('cities')->get();
            $result['city'] = $city;
            return view('admin.activityAdd')->with("result",$result);
        }
        else
        {
            return '<script>location.href="/admin/login"</script>';
        }

//        return $this->addId;
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

        $data['image'] = $img;

        $input = $request->all();
        $data['activityId'] = RandomId::create(8);
        $data['activityId'] = $this->checkId($data['activityId']);

        $data['kindId'] = $input['kindId'];
        $data['title'] = $input['title'];
        $data['place'] = $input['place'];
        $data['price'] = $input['price'];
        $data['tips'] = $input['tips'];
        $data['details'] = $input['details'];
        $data['name'] = $input['name'];
        $data['personInfo'] = $input['personInfo'];
        $data['date'] = $input['date'];
        $data['maxNum'] = $input['maxNum'];
        $data['minNum'] = $input['minNum'];
        $data['time'] = $input['time'];
        $data['city'] = $input['city'];
        $data['show'] = $input['show'];
        $data['addTime'] = time();
        DB::table('activities')->insert($data);
        return view('admin.addLocation')->with('kindId',$data['kindId']);
    }
    public function activityEdit($id)
    {
        session_start();
        if (isset($_SESSION['login']))
        {
            $res = DB::table('activities')->where('activityId',$id)->get();
            $city = DB::table('cities')->get();
            $result['res'] = $res;
            $result['city'] = $city;
            return view('admin.activityEdit')->with('result',$result);
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

        $data['activityId'] = $input['activityId'];
        $data['kindId'] = $input['kindId'];
        $data['title'] = $input['title'];
        $data['place'] = $input['place'];
        $data['price'] = $input['price'];
        $data['tips'] = $input['tips'];
        $data['details'] = $input['details'];
        $data['name'] = $input['name'];
        $data['personInfo'] = $input['personInfo'];
        $data['date'] = $input['date'];
        $data['maxNum'] = $input['maxNum'];
        $data['minNum'] = $input['minNum'];
        $data['time'] = $input['time'];
        $data['city'] = $input['city'];
        $data['show'] = $input['show'];
        $data['addTime'] = time();
        DB::table('activities')->where('activityId',$data['activityId'])->update($data);
        return view('admin.addLocation')->with('kindId',$data['kindId']);
//        return $input['city'];
    }
    public function kindDelete(Request $request)
    {
        $input = $request -> all();
        $kindId = $input['kindId'];
        DB::table('kinds')->where('kindId',$kindId)->delete();
        return '<script>location.href="../activity";</script>';
    }
    public function top($id)
    {
        $data['top'] = 'yes';
        $data['addTime'] = time();
        DB::table('activities')->where('activityId',$id)->update($data);
        $res = DB::table('activities')->where('activityId',$id)->get();
        foreach($res as $re)
            $kindId = $re -> kindId;
        return '<script>location.href="../../list/'.$kindId.'"</script>';

//        return 'yes';
    }
    public function cancelTop($id)
    {
        $data['top'] = 'no';
        $data['addTime'] = time();
        DB::table('activities')->where('activityId',$id)->update($data);
        $res = DB::table('activities')->where('activityId',$id)->get();
        foreach($res as $re)
            $kindId = $re -> kindId;
        return '<script>location.href="../../list/'.$kindId.'"</script>';

//        return 'yes';
    }
    private function checkId($id)
    {
        $check = DB::table('activities')->where('activityId',$id)->get();
        if ($check != [])
        {
            $id = RandomId::create(8);
            $id = $this->checkId($id);
        }
        return $id;
    }
}
