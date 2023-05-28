<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['name','email','password']; 

    use HasFactory;

//     public function permissions()
//    {
//     return $this->belongsToMany(Product::class, 'member_permissions');
//    }

    public function permissions()
    {
        return $this->hasMany(MemberPermission::class, 'member_id');
    }
}
