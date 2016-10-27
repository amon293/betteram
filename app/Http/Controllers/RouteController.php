<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * @param \App\Models\Route $route
     * @return \Illuminate\View\View
     */
    public function index(Route $route)
    {
        $routes = $route->orderby('id', 'DESC')->paginate(15);
        return view('route.index', compact('routes'));
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
     * @param \App\Models\Airport $airport
     * @return $this
     */
    public function edit(Airport $airport)
    {
        return view('airport.edit')->with('airport', $airport);
    }

    /**
     * Update Airport
     *
     * @param \App\Http\Requests\AirportCreation $request
     * @param \App\Models\Airport $airport
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
     * @param \App\Models\Airport $airport
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
