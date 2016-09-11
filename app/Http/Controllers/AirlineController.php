<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class AirlineController extends Controller
{
    public function create($request)
    {
        $airline = new Airline();

        $airline->setAttribute('name', $request->get('name'));
        $airline->save();

    }
}
