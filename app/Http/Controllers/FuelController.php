<?php

namespace App\Http\Controllers;

use App\Models\Fuel;

/**
 * Class FuelController
 *
 * @package App\Http\Controllers
 */
class FuelController extends Controller
{
    /**
     * Display Index Page
     *
     * @param \App\Models\Fuel $fuel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Fuel $fuel)
    {
        return view('fuel.index')->with('fuel', $fuel->now()->get()->transform(function ($data) {
            return [
                'time' => $data->date->toTimeString(),
                'price' => $data->price
            ];
        }));
    }
}
