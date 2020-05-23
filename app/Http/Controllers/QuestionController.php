<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index()
    {
        return QuestionResource::collection(Question::paginate(5));
    }

    public function store(Request $request)
    {
        return Question::create($request->all());
    }

    public function show(Question $question)
    {
        return $question;
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json(null, 204);
    }

    public function update(Question $question, Request $request)
    {
        $question->update($request->all());
        return $question;
    }
}
