<?php

namespace App\Http\Controllers;

use App\Models\Workpreferences;
use Illuminate\Http\Request;

class WorkPreferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Workpreferences::All();
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
        $create = Workpreferences::create([
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
        'specific_profile' => $request->specific_profile,
        'general_profile' => $request->general_profile,
        'area' => $request->area,
        'change_city' => $request->change_city,
        ]);

        // $data = new Workpreferences();
        // $data->desired_job = $request->desired_job;
        // $data->type_contract = $request->type_contract;
        // $data->work = $request->work;
        // $data->practices = $request->practices;
        // $data->dual_education = $request->dual_education;
        // $data->desired_salary = $request->desired_salary;
        // $data->hours = $request->hours;
        // $data->avaible_date = $request->avaible_date;
        // $data->preferred_state = $request->preferred_state;
        // $data->preferred_city = $request->preferred_city;
        // $data->preferred_country = $request->preferred_country;
        // $data->specific_profile = $request->specific_profile;
        // $data->general_profile = $request->general_profile;
        // $data->area = $request->area;
        // $data->change_city = $request->change_city;

        // $data->save();

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
    public function update(Request $request, WorkPreferences $WorkPreferences)
    {
        //
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
