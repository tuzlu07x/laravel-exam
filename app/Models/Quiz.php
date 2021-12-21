<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable=[
        'title',
        'description',
        'finished_at',
        'status',
    ];
    use HasFactory;

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }
}
