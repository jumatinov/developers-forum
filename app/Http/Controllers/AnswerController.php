<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api');
    }

    public function index()
    {
        return Answer::all();
    }

    public function store(Request $request)
    {
        return Answer::create($request->all());
    }

    public function show(Answer $answer)
    {
        return $answer;
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return response()->json(null, 204);
    }

    public function update(Answer $answer, Request $request)
    {
        $answer->update($request->all());
        return $answer;
    }
}
