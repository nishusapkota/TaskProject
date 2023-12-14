<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return QuestionResource::collection(Question::paginate(2));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $data=$request->validated();
        //return $data;
        //$options = $request->has('options') ? $request->options : [];
        $data['options'] = json_encode($request->options);

         $question=Question::create($data);
        return new QuestionResource($question);

    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Question $question,UpdateQuestionRequest $request)
    {
    $data=$request->validated();
    $question->update($data);
    return new QuestionResource($question);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->nocontent();
    }
}
