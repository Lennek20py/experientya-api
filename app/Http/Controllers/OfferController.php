<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreOfferRequest;
use Inertia\Inertia;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('id', 'desc')->paginate(5);

        return Inertia::render('Offer/Index', [
            'offers' => $offers
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
