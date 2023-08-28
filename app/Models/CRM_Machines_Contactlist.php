<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRM_Machines_Contactlist extends Model
{
    use HasFactory;

    protected $table = 'CRM_Machines_Contactlist';

    protected $fillable = [
        'crm_machine_id','contact_person_position','other_contact_person_position', 'contact_person_name', 'contact_person_phone',
        'contact_person_mobile', 'contact_person_email', 'contact_commu_software',
    ];
}
