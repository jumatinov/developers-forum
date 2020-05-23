<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'user_id', 'answer'];

    protected $dates = ['created_at'];

    public function question()
    {
        return $this->belongsTo(Answer::class);
    }

    public function likes()
    {
        return $this->hasMany(AnswerLike::class, 'answer_id');
    }
}
