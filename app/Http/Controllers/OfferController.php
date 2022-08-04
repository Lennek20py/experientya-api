<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
