<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'CRM_Questions';
    protected $fillable = [
        'title',
        'content',
        'photo',
        'video',
        'machine_model',
        'machine_serial',
        'answer_stat'
    ];

    public function member()
{
    return $this->belongsTo(Member::class);
}
    public function answers()
{
    return $this->hasMany(Answer::class);
}
}
