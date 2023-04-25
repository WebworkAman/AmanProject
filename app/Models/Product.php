<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 取得該產品的所有提問資訊

    public function question(){
        return $this->hasMany(Question::class);
    }
}
