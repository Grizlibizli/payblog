<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('driver/add');
    }

    /**
     * @param Request $request
     */
    public function add(Request $request)
    {
        if ($request->method() === TaxiDriverController::REQUEST_POST) {
            $driver = new Car();
            $driver->setRawAttributes($driver->prepareParams($request->all()));

            if ($driver->save()) {
                return view('home');
            }
        } else {
            return view('car/add');
        }
    }
}
