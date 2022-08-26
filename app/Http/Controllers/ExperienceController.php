<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Experience::all();
        return response()->json($data);
        // return csrf_token();
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
        Experience:: create([
            'cv_id' => $request->cv_id,
            'job' => $request->job,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'company' => $request->company,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'company_description' => $request->company_description

        ]);

        return redirect()->route('user.micv')->with('message','Datos insertados correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience, $id)
    {
        $data = Experience::where('cv_id', $id)->get();
        
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience, $id)
    {
        $data = Experience::where('id', $id)->update([
            'cv_id' => $request->cv_id,
            'job' => $request->job,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'company' => $request->company,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'company_description' => $request->company_description,
        ]);

        return redirect()->route('user.micv')->with('message', 'Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Experience::findOrFail($id)->delete();
        return redirect()->route('user.micv')->with('message', 'Datos eliminados con exito');
    }
}
