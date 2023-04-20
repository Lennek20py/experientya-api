<?php

namespace App\Http\Controllers;

use App\Models\AppliedOffer;
use App\Models\Cv;
use App\Models\Offer;
use App\Models\User;
use App\Models\WorkPreferences;
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
        $work_preferences = WorkPreferences::where('user_id', $id)->first();
        $type_work = array();
        array_push($type_work, $work_preferences->work === "1" ? "Empleo" : "");
        array_push($type_work, $work_preferences->practices === "1" ? "Práctica profesional" : "");
        array_push($type_work, $work_preferences->dual_education === "1" ? "Educación Dual" : "");
        $first_word = strtok($basic_info->position, " ");
 
        $vacancies = Offer::select('offers.*', 'companies.company_name', 'companies.company_address', 'states.name AS state', 'towns.name AS town')
            ->join('companies', 'offers.company_id', '=', 'companies.id')
            ->join('states', 'offers.state_id', '=', 'states.id')
            ->join('towns', 'offers.town_id', '=', 'towns.id');

        $filter_vacancies = $vacancies->when(request()->get('all') == 'Y' && request()->get('search') == null, function ($query) use ($request) {
            $query->where('title', 'LIKE', "%%");
        })
            ->when(request()->get('search') != null, function ($query) use ($request) {
                $query->where('title', 'LIKE', "%{$request->search}%");
            })
            ->when(request()->get('type_work') != null, function ($query) {
                $query->where('type_job', request()->get('type_work'));
            })
            ->when(request()->get('time_work') != null, function ($query) {
                $query->where('type_horary', request()->get('time_work'));
            })
            ->when(request()->get('payment_type') != null, function ($query) {
                $query->where('payment_type', request()->get('payment_type'));
            })
            ->when(request()->get('moving') == 'Y', function ($query) use ($user) {
                $query->where('offers.state_id', $user->user_state_id);
            })
            ->when(request()->get('all') != 'Y', function ($query) use ($first_word, $type_work) {
                $query->where('title', 'LIKE', "%{$first_word}%")
                    ->where('title_job', 'LIKE', "%{$first_word}%")
                    ->whereIn('type_job', $type_work);
            })
            ->get();

        return $filter_vacancies;
    }

    public function appliedVacants()
    {
        $user = User::findOrFail(request()->get('cv_id'));
        $cv_id = $user->cvs->first()->id;
        $applied_info = AppliedOffer::where('cv_id', $cv_id)->get();
        $offers_id = $applied_info->map(function ($item, $key) {
            return $item->id;
        });
        $applied_offers = Offer::whereIn('id', $offers_id)->get();
        return $applied_offers;
    }


    /**
     * Show the render view detail with a Vacancie ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $vacant = Offer::select(
            'offers.*',
            'companies.email AS company_email',
            'companies.profile_photo_path AS company_profile_photo_path',
            'companies.company_name AS company_name',
            'states.name as state_name',
            'towns.name as city_name',
        )
            ->join('companies', 'companies.id', '=', 'offers.company_id')
            ->join('states', 'states.id', '=', 'offers.state_id')
            ->join('towns', 'towns.id', '=', 'offers.town_id')
            ->where('offers.id', $id)
            ->first();

        return Inertia::render('User/VacanciesDetail', [
            'vacant' => $vacant
        ]);
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
