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
        $airports = $airport->orderby('id', 'DESC')->paginate(15);
        return view('airport.index', compact('airports'));
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
