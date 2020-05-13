<?php

namespace App\Http\Controllers;

use App\AnswerLike;
use Illuminate\Http\Request;

class AnswerLikeController extends Controller
{
    public function setAnswerDislikeLike(Request $request)
    {
        return AnswerLike::setAnswerDislikeLike($request->all());
    }
}
