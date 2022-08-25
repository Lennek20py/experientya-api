<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\StateV2;
use Illuminate\Http\Request;

class CountriesStatesCitiesController extends Controller
{
   public function fetchCountries()
   {
    $countries = Country::all();
    return response()->json($countries);
   }

   public function fetchStates($id)
   {
    $states = StateV2::where('country_code', $id)->orderBy('name', 'asc')->get();

    return response()->json($states);
   }

   public function fetchCities($id)
   {
    $cities = City::where('state_code', $id)->orderBy('name', 'asc')->get();

    return response()->json($cities);
   }
   
   public function searchCountry($id)
   {

    $data = Country::join('states', 'states.country_id', '=', 'countries.id')
                    ->join('cities', 'cities.state_id', '=', 'states.id')
                    ->where('cities.id', $id)
                    ->get(['countries.name as country', 'states.name as state', 'cities.name as city']);
                    
    return response()->json($data);
    // SELECT countries.name, states.name, cities.name FROM countries INNER JOIN states on states.country_id = countries.id INNER JOIN cities ON cities.state_id = states.id WHERE cities.id = 149237;

    }
   public function searchState($id)
   {

    $state = StateV2::where('id', $id)->get();
    return response()->json($state);

   }


   public function searchCity($id)
   {
    
    $state = City::where('id', $id)->get();
    return response()->json($state);

   }
}
