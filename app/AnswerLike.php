<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerLike extends Model
{
    protected $fillable = ['user_id', 'answer_id', 'type'];

    const TYPE_LIKE = 'like';
    const TYPE_DISLIKE = 'dislike';

    public static function setAnswerDislikeLike(array $data)
    {

    }
}
