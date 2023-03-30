<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCustomerGmail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='customergmail';
    protected $fillable=[
        
        'customerid',
        'email'
    ];
}
