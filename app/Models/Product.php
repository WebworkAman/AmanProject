<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 取得該產品的所有提問資訊
    protected $table = 'CRM_Products';

    public function question(){
        return $this->hasMany(Question::class);
    }
    public function faq(){
        return $this->hasMany(FAQ::class);
    }
    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_permissions');
    }
    public function series()
    {
        return $this->belongsTo(CRM_Product_Series::class, 'CRM_Product_Series_id');
    }


}
