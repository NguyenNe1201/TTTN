<?php

namespace App\Http\Services;
use App\Models\AddCustomer;
use App\Models\AddCustomerGmail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;

class AddCustomerService
{ 
   // select table users
   public function getemployce(){
     return DB::table('users')->get();
   }
   // get id table cutomer
   public function getcustomer(){
      return DB::table('customer')->get();
   }
   public function getcustomergmail(){
      return DB::table('customergmail')->get();
   }
   //add cutomer
   public function create_table($request)
    {
     try{
    
        $id=AddCustomer::insertGetId([
         'employceid'=>(string)$request->input('employceid'),
         'customername'=>(string)$request->input('customername'),
         'phone'=>(string)$request->input('phone'), 
         'address'=>(string)$request->input('address'),
         'status'=>(int)$request->input('status'),
        ]);

        AddCustomerGmail::create([
         'customerid'=>$id,
         'email'=>(string)$request->input('email'),
        ]);

        FacadesSession::flash('success','Add Customer success');
 
      }catch(\Exception $err){
       FacadesSession::flash('error',$err->getMessage());
       return false;
       
      }
     return true;
 
   }
   // get id customer
   // public function getDetailCustomer($id){
   //    return  DB::Select('SELECT * FROM customer,customergmail WHERE  customer.id=customerid and customer.id=?',[$id]);
   // }
   // delete list 1 cutomer
     public function deleteCustomer($id){
      return DB::delete("DELETE FROM customer WHERE id=?",[$id]); 
   }
   public function deleteCustomer2($id){
      return DB::table('customergmail')->where('customerid',$id)->delete();
   }
   //delete checkbox customer
   public function deleteCheckbox($request){
      $ids=$request->id;
      DB::table('customer')->whereIn('id',$ids)->delete();
      DB::table('customergmail')->whereIn('customerid',$ids)->delete();
      FacadesSession::flash('success','Delete Customer Cuccess!');
   }
   // add email of 1 costomer
   public function create_addemail($request){
      if((int)$request->input('customerid')==0){
          FacadesSession::flash('error','You Have Not Select A Customer!');
      }else{
          try{
            AddCustomerGmail::create([
                  'customerid'=>(int)$request->input('customerid'),
                  'email'=>(string)$request->input('email'),
                  ]);
                  FacadesSession::flash('success','Add Email Success!');
                  
              }
              catch (\Exception $err){
                  FacadesSession::flash('error','Add Email Not Success!');
                  return false;
  
              }
      }
  }
   // Edit/update customer
   public function updateCustomer($request, $id){
      try{
         $update = DB::table('customer')->where('id', $id)->update([
             'customername'=>(string)$request->input('customername'),
             'phone'=>(string)$request->input('phone'),
             'status'=>(int)$request->input('status'),
             'address'=>(string)$request->input('address'),
     ]);
         FacadesSession::flash('success','Update customer success!');
         
     }
     catch (\Exception $err){
         FacadesSession::flash('error',$err->getMessage());
         return false;
         
     }
     return true;
   }
   //edit mail customer
   public function getDetailCustomer1($id){
      return  DB::table('customer')->where('id',$id)->get();
   }
   public function editcustomer_mail($id){
      return DB::table('customergmail')->where('customerid',$id)->get();
  }
  public function update_email($request){
       $id=(int)$request->input('customermail');
      if($id==0){
       FacadesSession::flash('error','Select Email To Update!');
      }else{
      try{
           $update = DB::table('customergmail')->where('id', $id)->update([
               'email'=>(string)$request->input('upldate_email'),
      ]);
           FacadesSession::flash('success','Update mail success!');
           
      }
       catch (\Exception $err){
           FacadesSession::flash('error','Update mail not success!');
           return false;
           
      }
      return true;
      }
   }

   //delete 1 email of customer
   public function  getDetailEmail($id){
      return  DB::table('customergmail')->where('id',$id)->get();
   }
   public function delete1email_cus($id){
      return DB::delete("DELETE FROM customergmail WHERE id=?",[$id]); 
   }
}