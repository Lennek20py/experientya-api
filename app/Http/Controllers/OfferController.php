<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Company;
use App\Models\CompanyPlan;
use App\Models\KillerQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreOfferRequest;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::query()
                    ->when(request()->get('search'), function($query, $search){
                        $query->where('title', 'like', "%{$search}%");
                    })
                    ->orderBy('id', 'desc')
                    ->where('company_id', Auth::id())
                    ->paginate(5)
                    ->withQueryString();

     return Inertia::render('Offer/Index', [
            'offers' => $offers,
            'filters' => request()->only(['search'])
        ]);


    }

    public function getOffer()
    {
        $offers = Offer::query()
                    ->when(request()->get('search'), function($query, $search){
                        $query->where('title', 'like', "%{$search}%");
                    })
                    ->orderBy('id', 'desc')
                    ->where('company_id', Auth::id())
                    ->get();

     return $offers;


    }

    public function create()
    {
        return Inertia::render('Offer/Create');
    }

    //StoreOfferRequest
    public function store(StoreOfferRequest $request)
    {
        if( $request->question_check == 1) {
            $offer = Offer::create($request->all());

            $plans = CompanyPlan::where('company_id', Auth::id())->get();

            foreach($plans as $plan) {
                if($plan->spaces_available > 0) {
                    $purchased_plan = CompanyPlan::find($plan->id);
                    $purchased_plan->spaces_available = ($plan->spaces_available - 1);
                    if (($plan->spaces_available - 1) == 0) {
                        $purchased_plan->status = 0;
                    }
                    $purchased_plan->save();
                    break;
                }
            }

            $cont = 1;
            $questions = array();
            while($cont < 10) {
                if ($request->{'question_'.$cont} !== null) {
                    array_push($questions, $request->{'question_'.$cont});
                }
                $cont = $cont + 1;
            }

            foreach($questions as $question) {
                $killer = new KillerQuestion;
                $killer->question = $question;
                $killer->offer_id = $offer->id;
                $killer->save();
            }

        } else {
            $offer = Offer::create($request->all());

            $plans = CompanyPlan::where('company_id', Auth::id())->get();

            foreach($plans as $plan) {
                if($plan->spaces_available > 0) {
                    $purchased_plan = CompanyPlan::find($plan->id);
                    $purchased_plan->spaces_available = ($plan->spaces_available - 1);
                    if (($plan->spaces_available - 1) == 0) {
                        $purchased_plan->status = 0;
                    }
                    $purchased_plan->save();
                    break;
                }
            }
        }

        // return $offer->id;
        return Redirect::route('offer.index')->with('message','Vacante guardada exitosamente');
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);

        $killers = KillerQuestion::where('offer_id', $id)->get();

        return Inertia::render('Offer/Edit',[
            'offer' => $offer,
            'killers' => $killers
        ]);
    }

    public function update(StoreOfferRequest $request, Offer $offer)
    {
        if( $request->question_check == 1) {
            $offer->update(array_filter($request->all()));

            $cont = 1;
            $questions = array();
            while($cont < 10) {
                if ($request->{'question_'.$cont} !== null) {
                    array_push($questions, $request->{'question_'.$cont});
                }
                $cont = $cont + 1;
            }

            foreach($questions as $question) {
                $killer = new KillerQuestion;
                $killer->question = $question;
                $killer->offer_id = $offer->id;
                $killer->save();
            }

            return redirect()->route('offer.edit', ['id' => $offer->id ])->with('message','Killer Questions actualizadas exitosamente');
            return Redirect::route('offer.index')->with('message','Vacante actualizada exitosamente');

        } else {

            $offer->update(array_filter($request->all()));
            return Redirect::route('offer.index')->with('message','Vacante actualizada exitosamente');
        }
        // return Redirect::route('offer.index')->with('message','Vacante actualizada exitosamente');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return Redirect::route('offer.index')->with('message','Vacante eliminada exitosamente');
    }

    public function changeStatus(Request $request, $id)
    {
        $offer = Offer::find($id);

        if ($request->status == 1) {
            $offer->status = 1;
        } else if ($request->status == 0) {
            $offer->status = 0;
        }

        $offer->save();

        return Redirect::route('offer.index')->with('message','Se actualizó el estado de la vacante');
    }
}
