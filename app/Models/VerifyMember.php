<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyMember extends Model
{
    use HasFactory;
    public $table = "verify_members";
    protected $fillable = ['user_id','token','verification_code'];

    public function user(){
        return $this->belongsTo(Member::class);
    }

        // 定義與 Member 模型的關聯
        public function member()
        {
            return $this->belongsTo(Member::class, 'user_id', 'id');
        }
}
