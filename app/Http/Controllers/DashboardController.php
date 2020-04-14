<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index(){
        // tidak perlu melempar data siswa ke dashboard 
        // karena sudah ada helpers \ranking5Besar siswa yang terdapat
        // app\helpers\Global.php
        return view('dashboards.index');
    }

}
