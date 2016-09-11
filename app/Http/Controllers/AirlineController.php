<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class AirlineController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('airline.create');
    }
}
