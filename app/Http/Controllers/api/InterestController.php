<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use App\Models\Tag;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return response()->json($tags);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tag_id' => 'required|exists:tags,id',
        ]);

        $interest = new Interest();
        $interest->user_id = $request->user()->id;
        $interest->tag_id = $request->input('tag_id');
        $interest->save();

        return response()->json(['message' => 'Interest saved successfully.'], 201);
    }
}
