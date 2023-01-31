<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Offer;
use App\Models\User;
use App\Models\Workpreferences;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $basic_info = Cv::where('user_id', $id)->first();
        $user = User::findOrFail($basic_info->user_id);
        $work_preferences = Workpreferences::where('user_id', $id)->first();
        $type_work = array();
        array_push($type_work, $work_preferences->work == "1" ? "Empleo" : "" );
        array_push($type_work, $work_preferences->practices == "1" ? "Práctica profesional" : "" );
        array_push($type_work, $work_preferences->dual_education == "1" ? "Educación Dual" : "" );
        $first_word = strtok($basic_info->position, " ");

        // dd($user->user_state_id);
        $vacancies = Offer::select('offers.*', 'companies.company_name', 'companies.company_address', 'states.name AS state', 'towns.name AS town')
        ->join('companies', 'offers.company_id', '=', 'companies.id')
        ->join('states', 'offers.state_id', '=', 'states.id')
        ->join('towns', 'offers.town_id', '=', 'towns.id');

        $filter_vacancies = $vacancies->when(request()->get('all') == 'Y' && request()->get('search') == null, function($query) use ($request) {
            $query->where('title', 'LIKE', "%%");
        })
        ->when(request()->get('search') != null, function($query) use ($request) {
            $query->where('title', 'LIKE', "%{$request->search}%");
        })
        ->when(request()->get('type_work') != null, function($query) {
            $query->where('type_job', request()->get('type_work'));
        })
        ->when(request()->get('time_work') != null, function($query) {
            $query->where('type_horary', request()->get('time_work'));
        })
        ->when(request()->get('payment_type') != null, function($query) {
            $query->where('payment_type', request()->get('payment_type'));
        })
        ->when(request()->get('moving') == 'Y', function($query) use ($user) {
            $query->where('offers.state_id', $user->user_state_id);
        })
        ->when(request()->get('all') != 'Y', function($query) use ($first_word, $type_work) {
            $query->where('title', 'LIKE', "%{$first_word}%")
            ->where('title_job', 'LIKE', "%{$first_word}%")
            ->whereIn('type_job', $type_work);
        })
        ->get();
        
        return $filter_vacancies;
    }


    /**
     * Show the render view detail with a Vacancie ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $vacant = Offer::findOrFail($id);
        
        return Inertia::render('User/Vacancies/VacantDetail');
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
        //
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
