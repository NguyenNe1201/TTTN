<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddEmployce\CreateFormRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\AddEmployceService;
use App\Models\AddEmployce;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
class AddEmployceController extends Controller
{  
    protected $EmployceServices;
    public function __construct(AddEmployceService $EmployceServices)
    {
        $this->EmployceServices=$EmployceServices;
    }
    

    public function create1(){
      return view('main.AddEmployce',['title'=>'Add Employce']);
    }
  
    public function store(CreateFormRequest $request){
      $result=  $this ->EmployceServices-> create($request);
      return redirect()->route('ListEmployce');
       //return redirect()->back();
    } 
    public function list(){
      $users=$this->EmployceServices->getUsers( );
      return view('main.ListEmployce',compact('users'),['title'=>'List Employce']);
    }

    public function getEditEmployce(Request $request ,$id=0){
      if(!empty($id)){
        $editEmployce=$this->EmployceServices->getDetailUsers($id);
        if(!empty($editEmployce[0])){
            $request->session()->put('id',$id);
            $editEmployce=$editEmployce[0];
          }else{
            return redirect()->route('ListEmployce')->with('msg','Người dùng không tồn tại!');
          } 
        }else{
          return redirect()->route('ListEmployce')->with('msg','Liên kết không tồn tại!');
        }
      return view('main.EditEmployce',compact('editEmployce'),['title'=>'Edit Employce']);
    }

   
    public function postEditEmployce(Request $request){
      $id=session('id');
      if(empty($id)){
          return back()->with('msg','Liên kết không tồn tại');
      }
      $request->validate([
             'name' => 'required|min:4',
             'email'=>'required|unique:users,email,'.$id,
          ],[
            
          ]);
      
      $result=$this->EmployceServices->updateUsers($request,$id);
       return redirect()->route('ListEmployce');
    }
   
    public function deleteEmployce($id=0){
      if(!empty($id)){ 
        $deteEmployce=$this->EmployceServices->getDetailUsers($id);
        if(!empty($deteEmployce[0])){
          $deleteStatus =  $this->EmployceServices->deleteUsers($id);
          if($deleteStatus){
            $msg='Delete User Success';
          }else{
            $msg='You Cannot Delete . Please Try Again!!!';
          }
        }else{
          $msg='User Donot Exist';
        } 
      }else{
        $msg = 'Link Doesnot Exist';
      }
      return redirect()->route('ListEmployce')->with('msg',$msg);
    }
}