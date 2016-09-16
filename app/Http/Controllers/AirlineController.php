<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirlineCreation;
use App\Jobs\CreateAirlineJob;
use App\Models\Airline;

/**
 * Class AirlineController
 *
 * @package App\Http\Controllers
 */
class AirlineController extends Controller
{
    /**
     * @param \App\Models\Airline $airline
     * @return \Illuminate\View\View
     */
    public function index(Airline $airline)
    {
        return view('airline.index')->with('airlines', $airline->all());
    }

    /**
     * Displays Create Airline Page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('airline.create');
    }

    /**
     * @param \App\Http\Requests\AirlineCreation $request
     */
    public function store(AirlineCreation $request)
    {

        $this->dispatch(new CreateAirlineJob(
            $request->input('name')
        ));

        return redirect()
            ->route('airlines')
            ->withSuccess('Airline was Created Successfully.');
    }

}
