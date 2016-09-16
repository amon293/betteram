<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportCreation;
use App\Jobs\CreateAirportJob;
use App\Models\Airport;

/**
 * Class AirportController
 *
 * @package App\Http\Controllers
 */
class AirportController extends Controller
{
    /**
     * @param \App\Models\Airport $airport
     * @return \Illuminate\View\View
     */
    public function index(Airport $airport)
    {
        return view('airport.index')->with('airports', $airport->all());
    }

    /**
     * Displays Create Airport Page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('airport.create');
    }

    /**
     * @param AirportCreation $request
     */
    public function store(AirportCreation $request)
    {

        $this->dispatch(new CreateAirportJob(
            $request->all()
        ));

        return redirect()
            ->route('airports')
            ->withSuccess('Airport was Created Successfully.');
    }
}
