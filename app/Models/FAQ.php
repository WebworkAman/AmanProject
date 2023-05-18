<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $fillable = ['product_id','question','answer'];
    
    public function faq()
    {
        return $this->belongsTo(Product::class);
    }
}
