<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OfferController extends Controller
{
    public function index()
    {
        return Inertia::render('Offer/Index');
    }

    public function create()
    {
        return Inertia::render('Offer/Create');
    }

    public function store(Request $request)
    {
        Offer::create($request->all());

        return Redirect::route('offer.index')->with('message','Vacante guardada exitosamente');
    }
}
