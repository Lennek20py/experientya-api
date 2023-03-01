<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Company;
use App\Models\CompanyPlan;
use App\Models\Plan;
use App\Models\User;
use App\Models\Cv;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = User::query()
        //                 ->when(
        //                     $request->filled("search"),
        //                     function ($q) use ($request) {
        //                         $q->whereHas("cv", fn ($q) => $q->where("position", "like", "%$request->search%"))
        //                             ->with(["cv" => fn ($q) => $q->where("position", "like", "%$request->search%")]);
        //                     }
        //                 )
        //                 ->get();

        $users = Cv::select(
                            'users.*',
                            'cv.position',
                            'states.name as state_name',
                            'towns.name as city_name',
                            'work_preferences.change_city',
                            'work_preferences.work',
                            'work_preferences.practices',
                            'work_preferences.dual_education',
                            'work_preferences.area',
                            'work_preferences.general_profile',
                            'work_preferences.specific_profile'
                            )
                        ->join('users', 'cv.user_id', "=", 'users.id')
                        ->join('states', 'states.id', "=", 'user_state_id')
                        ->join('towns','towns.id', '=','users.user_city_id')
                        ->join('work_preferences', 'work_preferences.user_id', "=", 'users.id');

        $allusers = $users->when(request()->get('search'), function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->with('certifications')
                                ->with('lenguages')
                                ->with('experiences')
                                ->with('studyDegrees');
                            })
                            ->when(request()->get('certifications') == 'Y', function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->has('certifications');
                            })
                            ->when(request()->get('lenguages') == 'Y', function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->has('lenguages');
                            })
                            ->when(request()->get('experiences') == 'Y', function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->has('experiences');
                            })
                            ->when(request()->get('educational_status') == 'Secundaria', function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->whereHas('studyDegrees', function($q) use ($request){
                                    $q->where('study_level', 'like', "%{$request->educational_status}%");
                                });
                            })
                            ->when(request()->get('educational_status') == 'Preparatoria', function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->whereHas('studyDegrees', function($q) use ($request){
                                    $q->where('study_level', 'like', "%{$request->educational_status}%");
                                });
                            })
                            ->when(request()->get('educational_status') == 'Licenciatura', function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->whereHas('studyDegrees', function($q) use ($request){
                                    $q->where('study_level', 'like', "%{$request->educational_status}%");
                                });
                            })
                            ->when(request()->get('educational_status') == 'Maestria', function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->whereHas('studyDegrees', function($q) use ($request){
                                    $q->where('study_level', 'like', "%{$request->educational_status}%");
                                });
                            })
                            ->when(request()->get('educational_status') == 'Doctorado', function($query) use($request){
                                $query->where('position', 'like', "%{$request->search}%")
                                ->where('user_state_id', 'like', "%{$request->state_id}%")
                                ->where('user_city_id', 'like', "%{$request->town_id}%")
                                ->where('change_city', 'like', "%{$request->change_address}%")
                                ->where('work', 'like', "%{$request->work}%")
                                ->where('practices', 'like', "%{$request->practices}%")
                                ->where('dual_education', 'like', "%{$request->dual_education}%")
                                ->where('area', 'like', "%{$request->area_id}%")
                                ->where('general_profile', 'like', "%{$request->general_id}%")
                                ->where('specific_profile', 'like', "%{$request->specific_id}%")
                                ->whereHas('studyDegrees', function($q) use ($request){
                                    $q->where('study_level', 'like', "%{$request->educational_status}%");
                                });
                            })
                            ->get();

        return Inertia::render('Company/Dashboard', [
            'users' => $allusers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $image = $request->file('profile_photo_path')->store('profile', 'public');

       $company = Company::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => $request->password,
            'company_phone_number' => $request->company_phone_number,
            'company_address' => $request->company_address,
            'company_postal_code' => $request->company_postal_code,
            'company_fiscal_address' => $request->company_fiscal_address,
            'RFC' => $request->RFC,
            'responsible_first_name' => $request->responsible_first_name,
            'responsible_last_name' => $request->responsible_last_name,
            'responsible_phone_number' => $request->responsible_phone_number,
            'description' => $request->description,
            'state_id' => $request->state_id,
            'town_id' => $request->town_id,
            'sector_id' => $request->sector_id,
            'profile_photo_path' => $image
        ]);
        $company -> sendEmailVerificationNotification();
        //return redirect()->route('verifyEmail');
       return redirect()->route('welcome');
        // return ['result' => 'OK'. " " . $image];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function cv($id)
    {
        $user = Cv::select(
                            'users.*',
                            'states.name as state_name',
                            'towns.name as city_name',
                            'cv.position',
                            'work_preferences.work',
                            'work_preferences.practices',
                            'work_preferences.dual_education',
                            'work_preferences.change_city',
                            'anuies_area.name as area_name',
                            'anuies_general.name as general_area_name',
                            'anuies_specific.name as specific_area_name'
                            )
                    ->join('users', 'cv.user_id', '=', 'users.id')
                    ->join('work_preferences', 'work_preferences.user_id', "=", 'users.id')
                    ->join('states', 'states.id', "=", 'users.user_state_id')
                    ->join('towns','towns.id', '=','users.user_city_id')
                    ->join('anuies_area', 'anuies_area.id', '=', 'work_preferences.area')
                    ->join('anuies_general', 'anuies_general.id', '=', 'work_preferences.general_profile')
                    ->join('anuies_specific', 'anuies_specific.id', '=', 'work_preferences.specific_profile')
                    ->where('users.id', $id)
                    ->with('studyDegrees')
                    ->with('certifications')
                    ->with('lenguages')
                    ->with('experiences')
                    ->with('userSkills')
                    ->first();


        return Inertia::render('Company/CV', [
            'user' => $user
        ]);
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
    public function update(Request $request, Company $company)
    {
        $image = $company->profile_photo_path;
        if($request->file('profile_photo_path')) {
            Storage::delete('public/'. $company->profile_photo_path);
            $image = $request->file('profile_photo_path')->store('profile', 'public');
        }

        $company->update([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => $request->password,
            'company_phone_number' => $request->company_phone_number,
            'company_address' => $request->company_address,
            'company_postal_code' => $request->company_postal_code,
            'company_fiscal_address' => $request->company_fiscal_address,
            'RFC' => $request->RFC,
            'responsible_first_name' => $request->responsible_first_name,
            'responsible_last_name' => $request->responsible_last_name,
            'responsible_phone_number' => $request->responsible_phone_number,
            'description' => $request->description,
            'state_id' => $request->state_id,
            'town_id' => $request->town_id,
            'sector_id' => $request->sector_id,
            'profile_photo_path' => $image
        ]);

        // return ['result' => $request->all()];

        return redirect()->route('company.settings');
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

    public function settings ()
    {
        $user_info = Company::select('companies.*','states.name as state_name', 'towns.name as town_name', 'sectors.name as sector_name')
                        ->join('states', 'companies.state_id', '=', 'states.id')
                        ->join('towns', 'companies.town_id', '=', 'towns.id')
                        ->join('sectors', 'companies.sector_id', '=', 'sectors.id')
                        ->where('companies.id', Auth::id())
                        ->first();

        $plans = Plan::all();

        $shoppings = CompanyPlan::select('company_plan.*', 'plans.name', 'plans.price')
                        ->join('plans', 'plans.id', '=', 'company_plan.plan_id')
                        ->join('companies', 'companies.id', '=', 'company_plan.company_id')
                        ->where('companies.id', Auth::id())
                        ->orderBy('id', 'desc')
                        ->get();

        return Inertia::render('Company/Settings',[
            'userInfo' => $user_info,
            'plans' => $plans,
            'shoppings' => $shoppings
        ]);
    }

    public function downloadCVPDF($id)
    {
        $user = Cv::select(
                        'users.*',
                        'states.name as state_name',
                        'towns.name as city_name',
                        'cv.position',
                        'work_preferences.work',
                        'work_preferences.practices',
                        'work_preferences.dual_education',
                        'work_preferences.change_city',
                        'anuies_area.name as area_name',
                        'anuies_general.name as general_area_name',
                        'anuies_specific.name as specific_area_name'
                        )
                ->join('users', 'cv.user_id', '=', 'users.id')
                ->join('work_preferences', 'work_preferences.user_id', "=", 'users.id')
                ->join('states', 'states.id', "=", 'users.user_state_id')
                ->join('towns','towns.id', '=','users.user_city_id')
                ->join('anuies_area', 'anuies_area.id', '=', 'work_preferences.area')
                ->join('anuies_general', 'anuies_general.id', '=', 'work_preferences.general_profile')
                ->join('anuies_specific', 'anuies_specific.id', '=', 'work_preferences.specific_profile')
                ->where('users.id', $id)
                ->with('studyDegrees')
                ->with('certifications')
                ->with('lenguages')
                ->with('experiences')
                ->with('userSkills')
                ->first();

        $user_photo = User::where('id', $id)->first();

        view()->share('cv.candidate_cv', $user, $user_photo);

        $pdf = PDF::loadView('cv.candidate_cv', ['user' => $user, 'user_photo' => $user_photo]);

        return $pdf->download('CV');
    }
}
