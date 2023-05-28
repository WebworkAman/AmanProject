<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPermission extends Model
{
    use HasFactory;


//     public function member()
// {
//     return $this->belongsToMany(Member::class, 'member_id');
// }

public function member()
{
    return $this->belongsTo(Member::class, 'member_id');
}

public function product()
{
    return $this->belongsTo(Product::class);
}
}
