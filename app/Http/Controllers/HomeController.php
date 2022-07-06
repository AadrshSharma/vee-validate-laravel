<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function tern(){
        return Inertia::render('Registration');
    }
    public function asd(){
        return Inertia::render('test');
    }
    public function routecheck(){
        return Inertia::render('Routecheck');
    }
}
