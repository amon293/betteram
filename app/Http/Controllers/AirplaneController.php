<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirplaneCreation;
use App\Jobs\CreateAirplaneJob;
use App\Models\Airplane;


/**
 * Class AirplaneController
 *
 * @package App\Http\Controllers
 */
class AirplaneController extends Controller
{
    /**
     * @param \App\Models\Airplane $airplane
     * @return \Illuminate\View\View
     */
    public function index(Airplane $airplane)
    {
        return view('airplane.index')->with('airplanes', $airplane->all());
    }

    /**
     * Displays Create Airplane Page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('airplane.create');
    }

    /**
     * @param \App\Http\Requests\AirplaneCreation $request
     */
    public function store(AirplaneCreation $request)
    {

        $this->dispatch(new CreateAirplaneJob(
            $request->file('image'), $request->all()
        ));

        return redirect()
            ->route('airplanes')
            ->withSuccess('Airplane was Created Successfully.');
    }
}
