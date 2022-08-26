<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreOfferRequest;
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

    public function create()
    {
        return Inertia::render('Offer/Create');
    }

    public function store(StoreOfferRequest $request)
    {
        Offer::create($request->all());

        return Redirect::route('offer.index')->with('message','Vacante guardada exitosamente');
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);

        return Inertia::render('Offer/Edit',[
            'offer' => $offer
        ]);
    }

    public function update(StoreOfferRequest $request, Offer $offer)
    {
        $offer->update(array_filter($request->all()));

        return Redirect::route('offer.index')->with('message','Vacante actualizada exitosamente');
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
