<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $fillable = ['product_id','question','answer','photo','video'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
