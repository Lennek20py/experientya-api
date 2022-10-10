<?php

namespace App\Http\Controllers;

use App\Models\AnswerTestCompetition;
use App\Models\AnswerTestSoftSkill;
use App\Models\Certification;
use App\Models\Cv;
use App\Models\Experience;
use App\Models\Language;
use App\Models\StudyDegree;
use App\Models\TestCompetition;
use App\Models\TestSoftSkill;
use App\Models\User;
use App\Models\Workpreferences;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index($id)
    {
        $cv_id = Cv::where('user_id', $id)->get('id')->first();
        TestCompetition::where('cv_id', $cv_id->id)->get('id')->first() === null ? $testComp_id = null : $testComp_id = TestCompetition::where('cv_id', $cv_id->id)->get('id')->first();
        TestSoftSkill::where('cv_id', $cv_id->id)->get('id')->first() === null ?  $testSoft_id = null : $testSoft_id = TestSoftSkill::where('cv_id', $cv_id->id)->get('id')->first();
        if ($cv_id) {
            $data = array(
                "work" => Workpreferences::where('user_id', $id)->first() ? "true" : "false",
                "study" => StudyDegree::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "certification" => Certification::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "language" => Language::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "experience" => Experience::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "testcompetition" => $testComp_id == null ? "false" : AnswerTestCompetition::where('test_complete_id', $testComp_id->id)->orderBy('question_number', 'desc')->first()->question_number,
                "testsoftskill" => $testSoft_id == null ? "false" : AnswerTestSoftSkill::where('test_id', $testSoft_id->id)->orderBy('question', 'desc')->first()->question

            );
        } else {
            $data = array(
                "work" => "false",
                "study" => "false",
                "certification" => "false",
                "language" => "false",
                "experience" => "false",
                "testsoftskill" => "false",
                "testcompetition" => "false"

            );
        }
        return $data;
    }
}
