<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','email','password']; 

    use HasFactory;

//     public static function getUser()
//    {
//     return Auth::user();
//     }
}
