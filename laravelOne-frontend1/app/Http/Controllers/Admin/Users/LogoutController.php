<?php


namespace App\Http\Controllers\Admin\Users;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LogoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function perform()
    { /**
        * Log out account user.
        *
        * @return \Illuminate\Routing\Redirector
        */
        Auth::logout();
        return redirect()->route('login');
    }
  
}
