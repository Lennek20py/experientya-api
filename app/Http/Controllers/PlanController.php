<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PlanController extends Controller
{
    public function store(Request $request)
    {
        $today = Carbon::now();

        $company = Company::find(Auth::id());

        $company->plans()->attach($request->id, [
                                    'spaces_available' => $request->spaces_available,
                                    'status' => $request->status,
                                    'remaining_days' => $request->remaining_days,
                                    'created_at' => $today,
                                    'updated_at' => $today
                                    ]);

        return Redirect::route('company.settings')->with('message','Paquete comprado exitosamente');
    }
}
