<?php

namespace App\Http\Controllers;

use App\Models\AnuiesArea;
use App\Models\AnuiesGeneral;
use App\Models\AnuiesSpecific;
use Illuminate\Http\Request;

class AnuiesController extends Controller
{
    public function fetchAreas()
    {
        $areas = AnuiesArea::all();

        return response()->json($areas);
    }

    public function fetchGenerals($id)
    {
        $generals = AnuiesGeneral::where('area_id', $id)->get();

        return response()->json($generals);
    }

    public function fetchSpecifics($id)
    {
        $specific = AnuiesSpecific::where('general_id', $id)->get();

        return response()->json($specific);
    }


}
