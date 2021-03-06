<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionWithTagResource;
use App\Question;
use App\Tag;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'questionsByTags', 'increaseViews']);
    }

    public function index(Request $request)
    {
        if ($request->has('searchText')) {
            return QuestionResource::collection(Question::where('title', 'like', '%' . $request->searchText . '%')
                ->orderBy('created_at', 'desc')->paginate(8));
        }
        return QuestionResource::collection(Question::orderBy('created_at', 'desc')->paginate(8));
    }

    public function store(Request $request)
    {
        $question = Question::create($request->all());
        if ($request->has('tag_id')) {
            $question->saveTag((int)$request->tag_id);
        }
        return $question;
    }

    public function show(Question $question)
    {
        return QuestionWithTagResource::make($question);
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

    public function questionsByTags($id)
    {
        return QuestionResource::collection(Tag::find($id)->questions()->paginate(5));
    }

    public function increaseViews($id)
    {
        $question = Question::find($id);
        $question->views = $question->views + 1;
        $question->save();
        return response()->json(['message' => 'Successful'], 200);
    }

}
