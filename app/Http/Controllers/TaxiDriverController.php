<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class TaxiDriverController extends Controller
{
    const REQUEST_GET = 'GET';

    const REQUEST_POST = 'POST';

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
        if ($request->method() === self::REQUEST_POST) {
            $driver = new Driver();
            $prepareParams = $driver->prepareParams($request->all());
            $driver->setRawAttributes($prepareParams);

            if ($driver->save()) {
                $driver->cars()->attach([1]);
                return view('home');
            }
        } else {
            return view('driver/add');
        }
    }
}

