<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($answer) {
//            echo "Answer created";
            $answer->question->increment('answers_count');
//            $answer->question->save(); // no need to call save its automatically called
        });

        static::saved(function ($answer) {
//            echo "Answer saved";
        });

        static::deleted(function ($answer) {
            $answer->question->decrement('answers_count');
        });

    }

    public function getStatusAttribute()
    {
        return $this->id === $this->question->best_answer_id ? 'vote-accepted' : '';
    }
}
