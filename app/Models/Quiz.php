<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
class Quiz extends Model
{
    use Sluggable;

    protected $fillable=[
        'title',
        'description',
        'finished_at',
        'status',
        'slug',
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
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
