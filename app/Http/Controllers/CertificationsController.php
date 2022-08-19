<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile("certification_path_name")) {
            $file = $request->file("certification_path_name");
            $nombre = $request->name_certification_capitalized."_".time().".".$file->guessExtension();
            $ruta = public_path("storage/certifications/".$nombre);

            if ($file->guessExtension() == "pdf") {
               copy($file, $ruta);
               Certification::create([
                'cv_id' => $request->cv_id,
                'name_certification' => $request->name_certification,
                'certification_path_name' => $nombre,
                ]);

            } else {
                dd("No es pdf");
            }
            
        } else {
            Certification::create([
                'cv_id' => $request->cv_id,
                'name_certification' => $request->name_certification,
        ]);

        }

        // $file = $request->file('certification_path_name')->store('certifications', 'public');
        

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
        $data = Certification::findOrFail($id);
        if (Storage::disk('public')->exists('certifications/'.$data->certification_path_name)) {
            Storage::disk('public')->delete('certifications/'.$data->certification_path_name);

        }
        $data->delete();

        // return $data;
        return redirect()->route('user.micv')->with('message', 'Datos eliminados correctamente');
    }
}
