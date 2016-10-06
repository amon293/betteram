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
        $airports = $airport->orderby('id','DESC')->paginate(5);
        return view('airport.index',compact('airports'));
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

    public function edit($id)
    {
        $airport = Airport::find($id);

        return view('airport.edit',compact('airport'));
    }

    public function update(AirportCreation $request,$id)
    {
       Airport::find($id)->update($request->all());

        return redirect()
            ->route('airports')
            ->withSuccess('Airport was updated Successfully.');
    }

    public function delete($id)
    {
      Airport::find($id)->delete();

       return redirect()
              ->route('airports')
              ->withSuccess('Airport was Deleted Successfully');
    }
}
