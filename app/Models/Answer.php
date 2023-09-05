<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'CRM_Answers';
    protected $fillable = ['question_id', 'member_id', 'answer'];

    public function question()
{
    return $this->belongsTo(Question::class);
}
}
