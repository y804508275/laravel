<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\RandomId;

class AdminController extends Controller
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['login']))
        {
            return view('admin.admin');
        }
        else
        {
            return '<script>location.href="/admin/login"</script>';
        }
    }

}
