<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    protected $fillable=[
        'question',
        'quiz_id',
        'image',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'correct_answer',

    ];

    use HasFactory;

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
