<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\StudyDegree;
use Illuminate\Http\Request;

class StudyDegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StudyDegree::all();

        return response()->json($data);
    }

    public function cvSearch($id)
    {
        $cv = Cv::where('user_id', $id)->get();
        return response()->json($cv);
    }
    public function getSchools()
    {
        $search = request()->get('search');
        $data = StudyDegree::distinct('school_name')->orderBy('school_name', 'asc')
            ->when($search !== null, function ($query) use ($search) {
                $query = $query->where('school_name', 'LIKE', '%' . $search . '%');
            })->pluck('school_name');
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $file = $request->file('file_degree_path')->store('certifications', 'public');

        StudyDegree::create([
            'cv_id' => $request->cv_id,
            'school_name' => $request->school_name,
            'study_level' => $request->study_level,
            'study_tittle' => $request->study_tittle,
            'study_specialty' => $request->study_specialty,
            'study_certificate' => $request->study_certificate,
            'study_status' => $request->study_status,
            'starting_month' => $request->starting_month,
            'starting_year' => $request->starting_year,
            'finished_month' => $request->finished_month,
            'finished_year' => $request->finished_year,
            'study_city' => $request->study_city,
            'study_state' => $request->study_state,
            'study_country' => $request->study_country,
            // 'file_degree_path' => $file,
        ]);
        return redirect()->route('user.micv')->with('message', 'Datos insertados correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = StudyDegree::where('cv_id', $id)->get();

        return response()->json($data);
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
        $data = StudyDegree::where('id', $id)->update([
            'cv_id' => $request->cv_id,
            'school_name' => $request->school_name,
            'study_level' => $request->study_level,
            'study_tittle' => $request->study_tittle,
            'study_specialty' => $request->study_specialty,
            'study_certificate' => $request->study_certificate,
            'study_status' => $request->study_status,
            'starting_month' => $request->starting_month,
            'starting_year' => $request->starting_year,
            'finished_month' => $request->finished_month,
            'finished_year' => $request->finished_year,
            'study_city' => $request->study_city,
            'study_state' => $request->study_state,
            'study_country' => $request->study_country

        ]);

        return redirect()->route('user.micv')->with('message', 'Datos actualizados correctamente');
        // return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StudyDegree::findOrFail($id)->delete();
        return redirect()->route('user.micv')->with('message', 'Datos eliminados correctamente');
        // return response()->json($data);
    }
}
