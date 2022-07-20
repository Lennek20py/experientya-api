<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Company/Dashboard');
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
    public function store(StoreCompanyRequest $request)
    {
        $image = $request->file('profile_photo_path')->store('profile', 'public');

        Company::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => $request->password,
            'company_phone_number' => $request->company_phone_number,
            'company_address' => $request->company_address,
            'company_postal_code' => $request->company_postal_code,
            'company_fiscal_address' => $request->company_fiscal_address,
            'RFC' => $request->RFC,
            'responsible_first_name' => $request->responsible_first_name,
            'responsible_last_name' => $request->responsible_last_name,
            'responsible_phone_number' => $request->responsible_phone_number,
            'description' => $request->description,
            'state_id' => $request->state_id,
            'town_id' => $request->town_id,
            'sector_id' => $request->sector_id,
            'profile_photo_path' => $image
        ]);

        return redirect()->route('welcome');
        // return ['result' => 'OK'. " " . $image];
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
        //
    }
}
