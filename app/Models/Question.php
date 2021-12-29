<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    protected $appends =['true_percent'];
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
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    public function my_answer(): HasOne
    {
        return $this->hasOne(Answer::class, 'question_id')->where('user_id',auth()->user()->id);
    }
    public function getTruePercentAttribute(){
        $answer_count = $this->answers()->count();
        $true_answer = $this->answers()->where('answer',$this->correct_answer)->count();
        
        return round((100/$answer_count)*$true_answer);
    }
}
