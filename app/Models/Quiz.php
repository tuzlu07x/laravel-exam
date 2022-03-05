<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use Sluggable;

    protected $fillable = [
        'title',
        'description',
        'finished_at',
        'status',
        'slug',
    ];
    protected $dates = ['finished_at', 'email_verified_at'];
    protected $appends = ['details','my_rank'];

    use HasFactory;

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }
    public function my_result(): HasOne
    {
        return $this->hasOne(Result::class, 'quiz_id')->where('user_id', auth()->user()->id);
    }
    public function result(): HasMany
    {
        return $this->hasMany(Result::class, 'quiz_id');
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
    public function getDetailsAttribute()
    {
        if ($this->result()->count() > 0) {
            return [
                'average' => round($this->result()->get()->avg('point')),
                'join_count' => $this->result()->count(),
            ];
        } else {
            return null;
        }
    }

    public function getMyRankAttribute()
    {
        $rank = 0;
        foreach ($this->result()->orderByDesc('point')->get() as $result) {
            $rank+=1;
            if (auth()->user()->id == $result->user_id) {
                return $rank;
            }
        }
    }

    public function topTen()
    {
        return $this->result()->OrderByDesc('point')->take(10);
    }
}
