<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    protected $appends=['details'];

    use HasFactory;

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }
    public function my_result():HasOne
    {
        return $this->hasOne(Result::class,'quiz_id')->where('user_id',auth()->user()->id);
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
    public function getDetailsAttribute(){
        return [
        'average' => $this->result()->get()->avg('point'),
        'join_count' => null,
        ];
    }

}
