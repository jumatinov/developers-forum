<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id', 'question', 'title'];

    protected $dates = ['created_at', 'updated_at'];

    public function getAnswersCountAttribute() : int
    {
        return count($this->answers);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'question_tags');
    }

    public function tag()
    {
        return $this->tags()->first();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    public function saveTag(int $id)
    {
        $this->tags()->sync([$id]);
        return self::fresh();
    }
}
