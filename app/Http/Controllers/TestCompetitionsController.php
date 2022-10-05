<?php

namespace App\Http\Controllers;

use App\Models\AnswerTestCompetition;
use App\Models\TestCompetition;
use Illuminate\Http\Request;

class TestCompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTest()
    {
        $data = TestCompetition::All();
        return csrf_token();
        // return $data;
    }
    public function indexAnswers()
    {
        $data = AnswerTestCompetition::All();
        return $data;
    }

    public function searchTest($id)
    {
        $data = TestCompetition::where('cv_id', $id)->get();
        return response()->json($data);
    }
    public function searchAnswers($id)
    {
        $data = AnswerTestCompetition::where('test_complete_id', $id)->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = TestCompetition::create([
            'cv_id' => $request->cv_id,
            'CountDete' => $request->CountDete,
            'CountInfl' => $request->CountInfl,
            'CountEsta' => $request->CountEsta,
            'CountCump' => $request->CountCump,
            'test_finished' => $request->test_finished,
            'finished_date' => $request->finished_date
        ]);
        return redirect()->route('user.micv');
    }

    public function storeAnswers(Request $request)
    {
        $datas = AnswerTestCompetition::updateOrCreate(
            [
                'test_complete_id' => $request->test_complete_id,
                'question_number' => $request->question_number
            ],
            [
                'best_word' => $request->best_word,
                'worst_word' => $request->worst_word,
                'fullAnswers' => $request->fullAnswers,
                'saved' => $request->saved
            ]
        );
        return redirect()->route('user.micv')->with('message', 'Pregunta guardada.');
    }

    public function updateTest(Request $request, $id)
    {
        $data = TestCompetition::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'cv_id' => $request->cv_id,
                'CountDete' => $request->CountDete,
                'CountInfl' => $request->CountInfl,
                'CountEsta' => $request->CountEsta,
                'CountCump' => $request->CountCump,
                'test_finished' => $request->test_finished,
                'finished_date' => $request->finished_date
            ]
        );
        return redirect()->route('user.micv');
    }
    public function updateAnswer(Request $request, $id)
    {
        $data = AnswerTestCompetition::where('id', $id)->update([
            'test_complete_id' => $request->test_complete_id,
            'question_number' => $request->question_number,
            'best_word' => $request->best_word,
            'worst_word' => $request->worst_word,
            'fullAnswers' => $request->fullAnswers,
            'saved' => $request->saved
        ]);
        return redirect()->route('user.micv')->with('message', 'Pregunta guardada.');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
