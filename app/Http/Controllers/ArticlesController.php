<?php

namespace App\Http\Controllers;

use App\Article;
use App\RandomId;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    private  $imgUrl = 'http://123.207.101.166/';
    public function index()
    {
        $article = DB::table('articles')->get();;
        return view('articles.admin')->with('articles',$article);
    }
    public function add()
    {
        return view('articles.add');
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
        $data['text'] = $input['text'];
        $data['articleId'] = RandomId::create(8);
        $data['image'] = $img;
        DB::table('articles')->insert($data);
        return '<script>location.href = "/admin/article";</script>';
    }
    public function edit($id)
    {
        $result = DB::table('articles')->where('articleId',$id)->get();
        return view('articles.edit')->with('result',$result);
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
        $data['text'] = $input['text'];
        DB::table('articles')->where('articleId',$input['articleId'])->update($data);
        return '<script>location.href = "/admin/article";</script>';
    }
    public function del(Request $request)
    {
        $id = $request->articleId;
        DB::table('articles')->where('articleId',$id)->delete();
        return '<script>location.href = "/admin/article";</script>';
    }
    public function show($id)
    {
        $result = DB::table('articles')->where('articleId',$id)->get();
        return view('main.article')->with('result',$result);

    }
}
