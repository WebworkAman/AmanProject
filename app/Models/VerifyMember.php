<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyMember extends Model
{
    use HasFactory;
    public $table = "verify_members";
    protected $fillable = ['user_id','token'];

    public function user(){
        return $this->belongsTo(Member::class);
    }
}
