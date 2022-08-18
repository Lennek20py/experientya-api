<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Certification::all();
        // return response()->json($data);
        return csrf_token();
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

        // $file = $request->file('certification_path_name')->store('certifications', 'public');
        Certification::create([
            'cv_id' => $request->cv_id,
            'name_certification' => $request->name_certification,
            // 'certification_path_name' => $file,
            'certification_path_name' => $request->certification_path_name,
        ]);

        return redirect()->route('user.micv')->with('message', 'Datos insertados correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Certification::where('cv_id', $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certification $certification, $id)
    {
        $data = Certification::where('id', $id)->update([
            'cv_id' => $request->cv_id,
            'name_certification' => $request->name_certification,

        ]);

        return redirect()->route('user.micv')->with('message', 'Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Certification::findOrFail($id)->delete();
        return redirect()->route('user.micv')->with('message', 'Datos eliminados correctamente');
    }
}
