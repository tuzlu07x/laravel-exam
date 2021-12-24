<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=['user_id','answer','question_id'];
    public $timestamps = false;

    use HasFactory;
}
