<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRM_Machines extends Model
{
    use HasFactory;

    protected $table = 'CRM_Machines';

    protected $fillable = [
        // New fields
        'company_ERP_id','company_tax_id','identity_perm', 'stat_info',
        // Machine basic data fields
        'machine_purchase_date', 'machine_model', 'machine_serial', 'installation_company_name',
        'installation_company_address', 'installation_vat_number', 'installation_company_phone',
        'installation_company_fax',
        // Purchase source fields
        'purchase_manufacturer', 'purchase_manufacturer_person', 'purchase_manufacturer_phone',
        'other_purchase_source', 'other_purchase_company_name',
        'other_purchase_company_address', 'other_purchase_tax_id', 'other_purchase_company_phone',
        'other_purchase_name', 'other_purchase_phone', 'other_purchase_description',
    ];
}
