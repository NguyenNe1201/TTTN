<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddEmployce extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='users';
    protected $fillable=[
        'name',
        
       
        'email',
        'username',
        'phone',    
        'password',
        'role',
        'address',
        'avatar',
    ];
}
