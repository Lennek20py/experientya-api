<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Language::all();
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
        if ($request->hasFile("language_certification_path_name")) {
            $file = $request->file("language_certification_path_name");
            $nombre = $request->language_certification_path_name_capitalized . "Cert" . "_" . time() . "." . $file->guessExtension();
            $ruta = public_path("storage/certifications/" . $nombre);

            if ($file->guessExtension() == "pdf") {
                copy($file, $ruta);
                Language::create([
                    'cv_id' => $request->cv_id,
                    'name_language' => $request->name_language,
                    'level' => $request->level,
                    'language_certification_path_name' => $nombre,
                ]);
            } else {
                dd("No es pdf");
            }
        } else {
            Language::create([
                'cv_id' => $request->cv_id,
                'name_language' => $request->name_language,
                'level' => $request->level,
            ]);
        }
        return redirect()->route('user.micv')->with('message', 'Datos insertados correctamente');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $Language
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Language::where('cv_id', $id)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $Language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $Language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $Language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Language::find($id);
        $data->cv_id = $request->input('cv_id');
        dd($data->cv_id);
        $data->name_language = $request->input('name_language');

        if ($request->hasFile('language_certification_path_name')) {
            $file = $request->file("language_certification_path_name");
            $nombre = $request->name_certification_capitalized . "Cert" . "_" . time() . "." . $file->guessExtension();
            $ruta = public_path("storage/certifications/" . $nombre);

            if ($file->guessExtension() == "pdf") {
                if (Storage::disk('public')->exists('certifications/'.$data->language_certification_path_name)) {
                    Storage::disk('public')->delete('certifications/'.$data->language_certification_path_name);
                }
                    copy($file, $ruta);
                    $data->language_certification_path_name = $nombre;
           } else {
                dd("No es pdf");
            }
        }

        $data->save();

        return redirect()->route('user.micv')->with('message', 'Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $Language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Language::findOrFail($id);
        if (Storage::disk('public')->exists('certifications/'.$data->language_certification_path_name)) {
            Storage::disk('public')->delete('certifications/'.$data->language_certification_path_name);
        }
        $data->delete();
        return redirect()->route('user.micv')->with('message', 'Datos eliminados correctamente');
    }

}
