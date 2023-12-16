<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    public function index()
    {
        return QuestionResource::collection(Question::paginate(2));
    }

    public function store(StoreQuestionRequest $request)
    {
        $data = $request->validated();
        $question = Question::create($data);
        return new QuestionResource($question);
    }

    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    public function update(Question $question, UpdateQuestionRequest $request)
    {
        $data = $request->validated();
        $question->update($data);
        return new QuestionResource($question);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response()->nocontent();
    }
}
