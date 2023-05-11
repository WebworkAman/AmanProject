<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = [
        'title',
        'content'
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
