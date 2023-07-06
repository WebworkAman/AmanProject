<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    // protected $fillable = ['name','email','password']; 
    protected $fillable = [
        'name', 'email', 'password', 'identity', 'phone',
        'company_name', 'company_address', 'tax_id', 'company_phone', 'company_fax',
        'company_website', 'company_ceo', 'purchase_person', 'purchase_person_phone',
        'purchase_person_ext', 'purchase_person_email', 'other_info', 'purchase_date',
        'machine_model', 'machine_serial', 'machine_installation', 'contact_person',
        'contact_person_name', 'contact_person_phone', 'contact_person_ext',
        'contact_person_mobile', 'contact_person_email', 'contact_software',
        'purchase_source', 'other_description'
    ];
    use HasFactory;

    public function permissions()
   {
    return $this->belongsToMany(Product::class, 'member_permissions');
   }

    // public function permissions()
    // {
    //     return $this->hasMany(MemberPermission::class, 'member_id');
    // }
}
