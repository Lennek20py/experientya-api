<?php

namespace App\Http\Controllers;

use App\Models\AnswerTestSoftSkill;
use App\Models\TestSoftSkill;
use Illuminate\Http\Request;

class TestSoftSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AnswerTestSoftSkill::All();
        return $data;
    }
    public function indexTest()
    {
        $data = TestSoftSkill::All();
        return $data;
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
        AnswerTestSoftSkill::updateOrCreate([
            'test_id' => $request->test_id,
            'question' => $request->question
        ], [
            'soft_skill_tittle' => $request->soft_skill_tittle,
            'answer_skill' => $request->answer_skill,
            'fullAnswers' => $request->fullAnswers,
            'saved' => $request->saved,
            'answer_date' => $request->answer_date
        ]);
        return redirect()->route('user.micv')->with('message', 'Pregunta guardada');
    }

    public function storeTest(Request $request)
    {
        TestSoftSkill::create([
            'cv_id' => $request->cv_id,
            'name_user' => $request->name_user,
            'finished_test' => $request->finished_test,
            'finished_date' => $request->finished_date

        ]);
        return redirect()->route('user.micv');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestSoftSkill  $testSoftSkill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = AnswerTestSoftSkill::where('test_id', $id)->get();
        return $data;
    }

    public function showTest($id)
    {
        $data = TestSoftSkill::where('cv_id', $id)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestSoftSkill  $testSoftSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(TestSoftSkill $testSoftSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestSoftSkill  $testSoftSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = TestSoftSkill::where('id', $id)->update([
            'finished_test' => $request->finished_test,
            'finished_date' => $request->finished_date
        ]);
        // return redirect()->route('user.micv')->with('message', 'Test finalizado');
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestSoftSkill  $testSoftSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TestSoftSkill::findOrFail($id);
        $data->delete();
        return $data;
    }
}
