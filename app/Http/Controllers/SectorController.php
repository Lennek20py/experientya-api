<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;

class SectorController extends Controller
{
    public function fetchSectors()
    {
        $sectors = Sector::all();

        return response()->json($sectors);
    }
}
