<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index ()
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register')
        ]);
    }

    public function companyRegister ()
    {
        return Inertia::render('Company/Register');
    }

    public function userRegister ()
    {
        return Inertia::render('User/Register');
    }

    public function welcome ()
    {
        return Inertia::render('WelcomeToPlatform');
    }

    public function miCV()
    {
        return Inertia::render('User/MiCV');
    }
}
