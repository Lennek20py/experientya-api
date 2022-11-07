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
use App\Models\UserSkill;
use App\Models\Workpreferences;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index($id)
    {
        $cv_id = Cv::where('user_id', $id)->get('id')->first();
        $testDisc = null;
        $testSoftSkill = null;
        TestCompetition::where('cv_id', $cv_id->id)->get('id')->first() === null ? $testComp_id = null : $testComp_id = TestCompetition::where('cv_id', $cv_id->id)->get('id')->first();
        if (TestCompetition::where('cv_id', $cv_id->id)->get('id')->first() === null ? $testComp_id = null : $testComp_id = TestCompetition::where('cv_id', $cv_id->id)->get('id')->first()) {
            if (AnswerTestCompetition::where('test_complete_id', $testComp_id->id)->orderBy('question_number', 'desc')->first()) {
                $testDisc = AnswerTestCompetition::where('test_complete_id', $testComp_id->id)->orderBy('question_number', 'desc')->first()->question_number;
            }
        } else {
            $testDisc = null;
        }

        TestSoftSkill::where('cv_id', $cv_id->id)->get('id')->first() === null ?  $testSoft_id = null : $testSoft_id = TestSoftSkill::where('cv_id', $cv_id->id)->get('id')->first();
        if (TestSoftSkill::where('cv_id', $cv_id->id)->get('id')->first() != null) {
            if (AnswerTestSoftSkill::where('test_id', $testSoft_id->id)->orderBy('question', 'desc')->first()) {
                $testSoftSkill = AnswerTestSoftSkill::where('test_id', $testSoft_id->id)->orderBy('question', 'desc')->first()->question;
            }
        } else {
            $testSoftSkill = null;
        }

        if ($cv_id) {
            $data = array(
                "position" => Cv::where('user_id', $id)->first() ? "true" : "false",
                "work" => Workpreferences::where('user_id', $id)->first() ? "true" : "false",
                "study" => StudyDegree::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "certification" => Certification::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "language" => Language::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "experience" => Experience::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "skill" => UserSkill::where('cv_id', $cv_id->id)->first() ? "true" : "false",
                "testcompetition" => $testDisc,
                "testsoftskill" => $testSoftSkill

            );
        } else {
            $data = array(
                "position" => "false",
                "work" => "false",
                "study" => "false",
                "certification" => "false",
                "language" => "false",
                "skill" => "false",
                "experience" => "false",
                "testsoftskill" => "false",
                "testcompetition" => "false"

            );
        }
        return $data;
    }
}
