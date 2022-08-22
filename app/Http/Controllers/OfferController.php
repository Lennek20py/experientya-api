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
}
