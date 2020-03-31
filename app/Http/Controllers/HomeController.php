<?php

namespace App\Http\Controllers;

use App\Car;
use App\Driver;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $drivers = Driver::all();

        return view('index', ['drivers' => $drivers]);
    }
}
