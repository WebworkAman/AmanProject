<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    // protected $fillable = ['name','email','password']; 
    // protected $fillable = [
    //     'name', 'email', 'password', 'identity', 'phone',
    //     'company_name', 'company_address', 'tax_id', 'company_phone', 'company_fax',
    //     'company_website', 'company_ceo', 'purchase_person', 'purchase_person_phone',
    //     'purchase_person_ext', 'purchase_person_email', 'other_info', 'purchase_date',
    //     'machine_model', 'machine_serial', 'machine_installation', 'contact_person',
    //     'contact_person_name', 'contact_person_phone', 'contact_person_ext',
    //     'contact_person_mobile', 'contact_person_email', 'contact_software',
    //     'purchase_source', 'other_description'
    // ];
    protected $fillable = [
        // Original fields
        'name', 'email', 'password',
        // New fields
        'identity', 
        // Company basic data fields
        'company_name', 'company_address', 'company_tax_id', 'company_phone', 'company_fax',
        'company_website', 'company_ceo', 'company_purchase_person_name', 'company_purchase_person_phone',
        'company_email', 'company_other_info',
        // Machine basic data fields
        'machine_purchase_date', 'machine_model', 'machine_serial', 'installation_company_name',
        'installation_company_address', 'installation_vat_number', 'installation_company_phone',
        'installation_company_fax',
        // Contact person fields
        'contact_person_position', 'contact_person_name', 'contact_person_phone', 
        'contact_person_mobile', 'contact_person_email', 'contact_software_data',
        // Purchase source fields
        'purchase_manufacturer', 'purchase_manufacturer_person', 'purchase_manufacturer_phone',
        'other_purchase_source', 'other_purchase_company_name',
        'other_purchase_company_address', 'other_purchase_tax_id', 'other_purchase_company_phone',
        'other_purchase_name', 'other_purchase_phone', 'other_purchase_description',
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
