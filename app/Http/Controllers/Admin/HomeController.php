<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
        $juma = DB::table('sumas')->count();
        $juke = DB::table('sukels')->count();
        $juta = DB::table('sutas')->count();
        $jupe = DB::table('supes')->count();
        return view('admin.tes2', compact('juma','juke','juta','jupe'));
    }

    public function tes(){
        return view('admin.tes');
    }
}
