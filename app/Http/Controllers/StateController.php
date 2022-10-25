<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Town;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    public function fetchStates()
    {
        $states = State::all();

        return response()->json($states);
        // return csrf_token();
    }

    public function fetchTowns($id)
    {
        $towns = Town::where('state_id', $id)->get();

        return response()->json($towns);
    }

    public function fecthTown($id)
    {
      $data = State::join('towns', 'towns.state_id', '=', 'states.id')
                ->where('towns.id', $id)
                ->get(['towns.*', 'states.name as state_name', 'towns.name as town_name']);

        return response()->json($data);

        /* 
        SELECT towns.*, states.* FROM towns INNER JOIN states ON towns.state_id = states.id WHERE towns.id = 2298;
        */
    }
}
