<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainLoginController extends Controller
{
    public function index(){
        return view('main.Home',['title'=>'Home']);
    }

}
