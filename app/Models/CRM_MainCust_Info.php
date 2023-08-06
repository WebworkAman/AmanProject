<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRM_MainCust_Info extends Model
{
    use HasFactory;

    protected $table = 'CRM_MainCust_Info';

    protected $fillable = [
        'company_ERP_id','company_tax_id',
        'company_name', 'company_address', 'company_phone', 'company_fax',
        'company_website', 'company_ceo', 'company_purchase_person_name', 'company_purchase_person_phone',
        'company_email', 'company_other_info',
    ];

    protected $casts = [
        'company_phone' => 'json',
        'company_phone' => 'json',
    ];


}
