<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.users.profile',['title'=>'Profile']);
    }
}
