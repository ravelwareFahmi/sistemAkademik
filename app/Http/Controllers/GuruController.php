<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
class GuruController extends Controller
{
    public function index(Guru $guru){
        return view('guru.profile', compact('guru'));
    }
}
