<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SitesController extends Controller
{
    //
    public function index()
    {
    	$name = "name2";
    	return view('sites.about')->with('name',$name);
    }
}
