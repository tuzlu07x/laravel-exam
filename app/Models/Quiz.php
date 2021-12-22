<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
class Quiz extends Model
{
    protected $fillable=[
        'title',
        'description',
        'finished_at',
        'status',
    ];
    protected $dates=['finished_at'];
    use HasFactory;

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    public function getFinishedAt($date)
    {
        return $date ? Carbon::parse($date) : null;
    }
}
