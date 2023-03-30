<?php

namespace App\Http\Services;
use App\Models\AddEmployce;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;

class AddEmployceService
{ 
   
    public function create($request)
   {
    try{
   
       AddEmployce::create([
         
        'name'=>(string)$request->input('name'),
        'avatar'=>(string)$request->input('file'),
        'email'=>(string)$request->input('email'),
        
        'username'=>(string)$request->input('username'),
       
        'phone'=>(string)$request->input('phone'),
        'password'=>(string)bcrypt($request->input('password')),

        // 'status'=>(string)$request->input('fullname'),
        'address'=>(string)$request->input('address'),
        'role'=>(int)$request->input('role'),
       ]);
       FacadesSession::flash('success','Add User Success');

    }catch(\Exception $err){
      FacadesSession::flash('error',$err->getMessage());
      return false;
      
    }
    return true;

   }
   // lấy dữ liêu ra
   public function getUsers(){
      $getAll=DB::table('users')->get();
      return $getAll;
   }
   
   public function getDetailUsers($id){
    return  DB::Select('SELECT * FROM users WHERE id =?',[$id]);
     
   }
   public function updateUsers($request,$id){
      try{
         $update = DB::table('users')->where('id', $id)->update([
             'name'=>(string)$request->input('name'),
             'avatar'=>(string)$request->input('file'),
             'phone'=>(string)$request->input('phone'),
             'email'=>(string)$request->input('email'),
             'username'=>(string)$request->input('username'),
             // 'status'=>(string)$request->input('fullname'),
             'address'=>(string)$request->input('address'),
             'password'=>(string)bcrypt($request->input('password')),
             'role'=>(int)$request->input('role'),
     ]);
         FacadesSession::flash('success','Update User Success');
         
     }
     catch (\Exception $err){
         FacadesSession::flash('error',$err->getMessage());
         return false;
         
     }
     return true;
   }

   public function deleteUsers($id){
      return DB::delete("DELETE FROM users WHERE id=?",[$id]);

   
   }
 }