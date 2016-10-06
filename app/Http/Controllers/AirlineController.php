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
            $request->user(), $request->all()
        ));

        return redirect()
            ->route('airlines')
            ->withSuccess('Airline was Created Successfully.');
    }

    public function edit($id)
    {
        $airline = Airline::find($id);

        return view('airline.edit',compact('airline'));
    }

    public function update(AirlineCreation $request,$id)
    {

       Airline::find($id)->update($request->all());

        return redirect()
            ->route('airlines')
            ->withSuccess('Airline was updated Successfully.');
    }

    public function delete($id)
    {
       Airline::find($id)->delete();

       return redirect()
              ->route('airlines')
              ->withSuccess('Airline was Deleted Successfully');
    }



}
