<?php

namespace App\Http\Controllers;

use App\Models\CandidatesInvite;
use Illuminate\Http\Request;

class CandidatesInvitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CandidatesInvite::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CandidatesInvite  $candidatesInvite
     * @return \Illuminate\Http\Response
     */
    public function show(CandidatesInvite $candidatesInvite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CandidatesInvite  $candidatesInvite
     * @return \Illuminate\Http\Response
     */
    public function edit(CandidatesInvite $candidatesInvite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CandidatesInvite  $candidatesInvite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CandidatesInvite $candidatesInvite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CandidatesInvite  $candidatesInvite
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandidatesInvite $candidatesInvite)
    {
        //
    }
}
