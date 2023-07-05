<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRecord extends Model
{
    use HasFactory;

    protected $table = "maintenance_records";

    protected $fillable = [
        'customer_name',
        // 其他可批量賦值的屬性
        'factory',
        'equipment_model',
        'purchase_date',
        'serial_number',
        'installation_date',
        'maintenance_date',
        'description',
        'maintenance_content',
        'quantity',
        'maintenance_personnel',
    ];

    //定義關聯
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
