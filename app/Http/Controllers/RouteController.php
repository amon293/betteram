<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteCreation;
use App\Jobs\CreateRouteJob;
use App\Models\Airplane;
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
        $airplanes = Airplane::all();
        $airports = Airport::all();
        return view('route.create', compact('airplanes', 'airports'));
    }

    /**
     * @param RouteCreation $request
     */
    public function store(RouteCreation $request)
    {
        $this->dispatch(new CreateRouteJob(
            Airplane::find($request->airplane_id),
            Airport::find($request->from_airport_id),
            Airport::find($request->to_airport_id),
            array_merge(
                $request->all(),
                ['airline_id' => 1]
            )
        ));

        return redirect()
            ->route('routes')
            ->withSuccess('Route was Created Successfully.');
    }

    /**
     * Edit Airport
     *
     * @param Route $route
     * @return $this
     */
    public function edit(Route $route)
    {
        $airplanes = Airplane::all();
        $airports = Airport::all();
        return view('route.edit', compact('route', 'airplanes', 'airports'));
    }

    /**
     * Update Airport
     *
     * @param RouteCreation $request
     * @param Route $route
     * @return mixed
     */
    public function update(RouteCreation $request, Route $route)
    {
        $route->airplane()->associate(Airplane::find($request->airplane_id));
        $route->fromAirport()->associate(Airport::find($request->from_airport_id));
        $route->toAirport()->associate(Airport::find($request->to_airport_id));
        $route->update($request->all());

        return redirect()
            ->route('routes')
            ->withSuccess('Route was updated Successfully.');
    }

    /**
     * Delete Airport
     *
     * @param Route $route
     * @return mixed
     */
    public function delete(Route $route)
    {

        $route->delete();

        return redirect()
            ->route('routes')
            ->withSuccess('Route was Deleted Successfully');
    }
}
