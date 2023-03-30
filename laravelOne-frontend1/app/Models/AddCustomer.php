<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCustomer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='customer';
    protected $fillable=[
     
        
       
       'employceid',
        'customername',
       'address',
        'phone',
       'email',
        'status'
    ];
}
