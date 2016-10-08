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
        $airlines = $airline->orderby('id', 'DESC')->paginate(5);
        return view('airline.index', compact('airlines'));
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
            $request->user(), $request->all()
        ));

        return redirect()
            ->route('airlines')
            ->withSuccess('Airline was Created Successfully.');
    }

    /**
     * Edit Airline
     *
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Airline $airline)
    {
        return view('airline.edit', compact('airline'));
    }

    /**
     * Update Airline
     *
     * @param \App\Http\Requests\AirlineCreation $request
     * @param \App\Models\Airline $airline
     * @return mixed
     */
    public function update(AirlineCreation $request, Airline $airline)
    {

        $airline->update($request->all());

        return redirect()
            ->route('airlines')
            ->withSuccess('Airline was updated Successfully.');
    }

    /**
     * Delete an Airline
     *
     * @param \App\Models\Airline $airline
     * @return mixed
     */
    public function delete(Airline $airline)
    {

        $airline->delete();

        return redirect()
            ->route('airlines')
            ->withSuccess('Airline was Deleted Successfully');
    }

}
