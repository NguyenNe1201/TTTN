<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\MainLoginController;
use App\Http\Controllers\AddEmployceController;
use App\Http\Controllers\Admin\Users\LogoutController;
use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UploadController;

Route::prefix('admin')->group(function(){
     Route::get('/logout',[LogoutController::class, 'perform'])->name('logout');
     Route::get('/users/login', [LoginController::class, 'index'])->name('login');
     Route::post('/users/login/strore', [LoginController::class, 'store']);

     Route::group(['middleware' => ['auth']], function() {
          
          Route::get('/main', [MainLoginController::class, 'index']) -> name('admin');
          Route::prefix('/addemployce')->group(function() {
               Route::get('/inputEmployce', [AddEmployceController::class, 'create1'])->name('addEmployce');
               Route::post('/inputEmployce', [AddEmployceController::class, 'store']);
             
          });
          Route::prefix('/listemployce')->group(function(){
               Route::get('/',[AddEmployceController::class,'list'])->name('ListEmployce');
               #edit upload user
               Route::get(('/edit/{id}'),[AddEmployceController::class,'getEditEmployce'])->name('edit_employce');
               Route::post(('/update'),[AddEmployceController::class,'postEditEmployce'])->name('postedit_employce');
               #delete user
               Route::get(('/delete/{id}'),[AddEmployceController::class,'deleteEmployce'])->name('delete_employce');

          });
           
          #upload img
          Route::post('/addemployce/upload',[UploadController::class,'index']);
           #add Customer
          Route::prefix('/addcustomer')->group(function(){
               Route::get('/inputCustomer', [CustomerController::class, 'create_customer'])->name('AddCustomer');
                  Route::post('/inputCustomer', [CustomerController::class, 'store_customer']);
          });
          Route::prefix('/listcustomer')->group(function(){
               Route::get('/',[CustomerController::class,'list_customer'])->name('ListCustomer');
               #add cutomer gmail
               Route::get(('/addcutomeremail/{id}'),[CustomerController::class,'getemail_customer'])->name('Customer_getemail');
               Route::post(('/addcutomeremail'),[CustomerController::class,'postemail_customer'])->name('Customer_postemail');
               #edit gmail customer
               Route::get(('/edit_emailcustomer/{id}'),[CustomerController::class,'getedit_email_customer'])->name('EditCustomer_getemail');
               Route::post(('/edit_emailcustomer'),[CustomerController::class,'postedit_email_customer'])->name('EditCustomer_postemail');
               #edit upload 1 customer
               Route::get(('/edit/{id}'),[CustomerController::class,'getedit_customer'])->name('edit_1customer');
               Route::post(('/update'),[CustomerController::class,'postEdit_customer'])->name('postedit1Customer');
               #delete customer checkbox
               Route::delete(('/delete'),[CustomerController::class,'delete_customer_checkbox'])->name('deleteCustomer');
               #delete 1 customer 
               Route::get(('/delete/{id}'),[CustomerController::class,'delete_customer'])->name('deleteCustomer1');
               #delete 1 gmail of customer
               Route::get(('/delete1/{id}'),[CustomerController::class,'delete_1email'])->name('delete1email');

          });

          Route::prefix('/profile')->group(function(){
               Route::get('/',[ProfileController::class,'index'])->name('profile_user');
              
          });
     });

});



