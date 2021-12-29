<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    public function my_answer(): HasOne
    {
        return $this->hasOne(Answer::class, 'question_id')->where('user_id',auth()->user()->id);
    }
}
