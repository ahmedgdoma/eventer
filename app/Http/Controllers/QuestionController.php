<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count($request->questions) > 0){
            foreach ($request->questions as $question_id){
                $question = Question::find($question_id);
                if(!$question){
                    return redirect()->back();
                }else{
                    $question->events()->attach($request->event_id);
                }
            }
        }
        $number = count($request->question);
        for($i = 0;$i < $number; $i++){
            if($request->question[$i] != ''){
                $question = new Question();
                $question->question = $request->question[$i];
                $question->type = $request->type[$i];
                $question->save();
                $question->events()->attach($request->event_id);
                foreach ($request->answers[$i] as $answer){
                    if($answer != ''){
                        $question->answers()->create(['answer'=>$answer]);
                    }
                }
            }
        }
        return redirect('/events/'. $request->event_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        if(!$question){
            return redirect()->back();
        }else{
            $question->events()->detach();
            $question->answers()->delete();
            $question->delete();
            return redirect()->back();
        }
    }

    public function addQuestionForEvent($event_id){
        $questions = Question::lists('question', 'id');
        return view('questions.add', compact('event_id', 'questions'));
    }
}
