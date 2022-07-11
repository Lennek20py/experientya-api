<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Town;

class StateController extends Controller
{
    public function fetchStates()
    {
        $states = State::all();

        return response()->json($states);
    }

    public function fetchTowns($id)
    {
        $towns = Town::where('state_id', $id)->get();

        return response()->json($towns);
    }
}
