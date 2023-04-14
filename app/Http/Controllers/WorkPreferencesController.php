<?php

namespace App\Http\Controllers;

use App\Models\WorkPreferences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WorkPreferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = WorkPreferences::All();
        return $data;
    }

    public function search($id)
    {
        $data = WorkPreferences::where('user_id', $id)->get();

        return response()->json($data);
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
        $create = WorkPreferences::create([
        'user_id' => $request->user_id,
        'desired_job' => $request->desired_job,
        'type_contract' => $request->type_contract,
        'work' => $request->work,
        'practices'=> $request->practices,
        'dual_education' => $request->dual_education,
        'desired_salary' => $request->desired_salary,
        'hours' => $request->hours,
        'avaible_date' => $request->avaible_date,
        'preferred_state' => $request->preferred_state,
        'preferred_city' => $request->preferred_city,
        'preferred_country' => $request->preferred_country,
        'specific_profile' => $request->specific_area,
        'general_profile' => $request->general_area,
        'area' => $request->area,
        'change_city' => $request->change_city,
        ]);

        return $create;	

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPreferences  $WorkPreferences
     * @return \Illuminate\Http\Response
     */
    public function show(WorkPreferences $WorkPreferences)
    {
    //    $data = WorkPreferences::find();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkPreferences  $WorkPreferences
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkPreferences $WorkPreferences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkPreferences  $WorkPreferences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkPreferences $WorkPreferences, $id)
    {
    //     // $data = WorkPreferences::findOrFail($id);

    //    $data = WorkPreferences::whereId($id)->update($request->all());

    //    return $data;

    $data = WorkPreferences::updateOrCreate(
        [
            'user_id' => $id
        ],
        [
            'desired_job' => $request->desired_job,
            'type_contract' => $request->type_contract,
            'work' => $request->work,
            'practices'=> $request->practices,
            'dual_education' => $request->dual_education,
            'desired_salary' => $request->desired_salary,
            'hours' => $request->hours,
            'avaible_date' => $request->avaible_date,
            'preferred_state' => $request->preferred_state,
            'preferred_city' => $request->preferred_city,
            'preferred_country' => $request->preferred_country,
            'specific_profile' => $request->specific_area,
            'general_profile' => $request->general_area,
            'area' => $request->area,
            'change_city' => $request->change_city,
        ]);

        // return Redirect::route('');
        return redirect()->route('user.micv')->with('message', 'Datos insertados correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkPreferences  $WorkPreferences
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkPreferences $WorkPreferences)
    {
        //
    }
}
