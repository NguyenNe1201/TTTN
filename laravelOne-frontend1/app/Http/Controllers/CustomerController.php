<?php


namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\AddCustomerService;
use App\Http\Requests\AddCustomer\CustomerRequest;
use App\Http\Requests\AddCustomer\AddEmailCustomerRequest;
use App\Http\Requests\AddCustomer\EditEmailCustomerRequest;
use App\Models\AddCustomer;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{ 
      protected $CustomerServices;
      public function __construct(AddCustomerService $CustomerServices)
      {
      $this->CustomerServices= $CustomerServices;
      }
      //Add customer
      public function create_customer(){
        $user = Auth::user();
        $name_employce =$this ->CustomerServices ->getemployce();
        return view('main.AddCustomer',compact('name_employce','user'),['title'=>'Add Customer']);
      }

      public function store_customer(CustomerRequest $request){
        $result=  $this ->CustomerServices-> create_table($request);
         return redirect()->route('ListCustomer');
      } 

      //List datatable customer
      public function list_customer(){
        $customer=$this->CustomerServices->getcustomer( );
        $customergmail=$this->CustomerServices->getcustomergmail( );
        return view('main.ListCustomer',compact('customer','customergmail'),['title'=>'List Customer']);
      }

      // Edit customer
      public function getedit_customer(Request $request ,$id=0 ){
        if(!empty($id)){
          $editCustomer=$this->CustomerServices->getDetailCustomer1($id);
          if(!empty($editCustomer[0])){
              $request->session()->put('id',$id);
              $editCustomer=$editCustomer[0];
            }else{
              return redirect()->route('ListCustomer')->with('msg','User does not exist!');
            } 
          }else{
            return redirect()->route('ListCustomer')->with('msg','Link does not exist!');
          }
        return view('main.EditCustomer',compact('editCustomer'),['title'=>'Edit Customer']);
      }

      public function postEdit_customer(Request $request){
        $id=session('id');
        if(empty($id)){
            return back()->with('msg','Liên kết không tồn tại');
        }
        $request->validate([
               
               'customername'=>'required|min:3',
               'phone'=>'required|digits:10|numeric'
            ],[
              // 'customername.min'=>'Customer Name phải từ :min ký tự trở lên',
              // 'phone.min' => 'passoword phải từ :min ký tự trở lên',
            ]);
        $result=$this->CustomerServices->updateCustomer($request,$id);
       
        return redirect()->route('ListCustomer');
      }

      //delete all of 1 customer
      public function delete_customer($id=0){
        if(!empty($id)){
          $deteCustomer=$this->CustomerServices->getDetailCustomer1($id);
          if(!empty($deteCustomer[0])){
            $deleteStatus =  $this->CustomerServices->deleteCustomer($id);
            $deletegmail =  $this->CustomerServices->deleteCustomer2($id);
            if($deleteStatus){
              $msg='Delete user success';
            }else{
              $msg='You cannot delete. Please try again later!!!';
            }
          }else{
            $msg='User does not exist';
          }
        }
        return 
        redirect()->route('ListCustomer')->with('msg',$msg);
      }

      // add gmail for customer
      public function getemail_customer($id=0){
        $customer=$this->CustomerServices->getDetailCustomer1($id);
        return response()->json([
          'customer'=>$customer,
        ]);
      }
      public function postemail_customer(AddEmailCustomerRequest $request ){
          $this->CustomerServices->create_addemail($request);
          return redirect()->route('ListCustomer');
      }

      // edit gmail customer
      public function getedit_email_customer($id=0){
        $editcustomer=$this->CustomerServices->getDetailCustomer1($id);
        $editcustomer_mail=$this->CustomerServices->editcustomer_mail($id);
        return response()->json([
            'status'=>200,
            'customer'=>$editcustomer,
            'customer_mail'=>$editcustomer_mail
        ]);
      } 
      public function postedit_email_customer(EditEmailCustomerRequest $request){
       
          $this->CustomerServices->update_email($request);
          return redirect()->route('ListCustomer');
      }

      //delete checkbox
      public function delete_customer_checkbox(Request $request){
        $this->CustomerServices->deleteCheckbox($request);
        return response()->json([
            'data' => $arr,
            'message' => 'Delete success',
            'error' => false,
            'success'=>"Delete success!"
        ]);
        
      }
    
      // delele 1 gmail of customer
      public function delete_1email($id=0){
        if(!empty($id)){ 
          $detele1_email=$this->CustomerServices->getDetailEmail($id);
          if(!empty($detele1_email[0])){
            $delete1e =  $this->CustomerServices->delete1email_cus($id);
            if($delete1e){
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
        return redirect()->route('ListCustomer')->with('msg',$msg);
      }
}
