<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable=[
        'title',
        'description',
        'finished_at',
        'status',
    ];
    use HasFactory;
}
