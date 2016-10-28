<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportCreation;
use App\Jobs\CreateAirportJob;
use App\Models\Airport;
use App\Models\Route;

/**
 * Class RouteController
 *
 * @package App\Http\Controllers
 */
class RouteController extends Controller
{
    /**
     * Show All Routes
     *
     * @param \App\Models\Route $route
     * @return \Illuminate\View\View
     */
    public function index(Route $route)
    {
        return view('route.index')->with('routes',
            $route->desc()->paginate()
        );
    }

    /**
     * Displays Create Route Page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('route.create');
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

    /**
     * Edit Airport
     *
     * @param Airport $airport
     * @return $this
     */
    public function edit(Airport $airport)
    {
        return view('airport.edit')->with('airport', $airport);
    }

    /**
     * Update Airport
     *
     * @param AirportCreation $request
     * @param Airport $airport
     * @return mixed
     */
    public function update(AirportCreation $request, Airport $airport)
    {

        $airport->update($request->all());

        return redirect()
            ->route('airports')
            ->withSuccess('Airport was updated Successfully.');
    }

    /**
     * Delete Airport
     *
     * @param Airport $airport
     * @return mixed
     */
    public function delete(Airport $airport)
    {

        $airport->delete();

        return redirect()
            ->route('airports')
            ->withSuccess('Airport was Deleted Successfully');
    }
}
