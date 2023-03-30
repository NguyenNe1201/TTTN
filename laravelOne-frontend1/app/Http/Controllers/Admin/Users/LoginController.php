<?php

namespace App\Http\Controllers\Admin\Users;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',['titlelogin'=> 'Login']);
    }
    public function store(Request $request){
     
       $this -> validate($request, ['email' => 'required|email:filter',
        'password'=> 'required',
        'g-recaptcha-response'=>'required|captcha'
    
    ]);

    if(Auth::attempt([
    'email'=> $request->input('email'),
    'password' => $request -> input('password')
     ], $request->input('remember')))
       {
          return redirect()-> route('admin');
       }
       session()->flash('error','Incorrect email or password. !');
       return redirect() -> back();
        }
}
