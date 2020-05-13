<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        return Tag::create($request->all());
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(null, 204);
    }

    public function update(Tag $tag, Request $request)
    {
        $tag->update($request->all());
        return $tag;
    }
}
