<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirplaneCreation;
use App\Jobs\CreateAirplaneJob;
use App\Models\Airplane;
use App\Models\Manufacturer;
use File;

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
        return view('airplane.index')
            ->with('airplanes', $airplane->all()->load('manufacturer'));
    }

    /**
     * Displays Create Airplane Page
     *
     * @param \App\Models\Manufacturer $manufacturer
     * @return \Illuminate\View\View
     */
    public function create(Manufacturer $manufacturer)
    {
        return view('airplane.create')
            ->with('manufacturers', $manufacturer->all());
    }

    /**
     * @param \App\Http\Requests\AirplaneCreation $request
     * @param \App\Models\Manufacturer $manufacturer
     * @return
     */
    public function store(AirplaneCreation $request, Manufacturer $manufacturer)
    {

        $this->dispatch(new CreateAirplaneJob(
            $request->file('image'), $manufacturer, $request->all()
        ));

        return redirect()
            ->route('airplanes')
            ->withSuccess('Airplane was Created Successfully.');
    }

    public function edit(Manufacturer $manufacturer,$id)
    {
        $airplane = Airplane::find($id);

        return view('airplane.edit',compact('airplane'))->with('manufacturers',$manufacturer->all());
    }

    public function update(AirplaneCreation $request,$id)
    {

       Airplane::find($id)->update($request->all());

        return redirect()
            ->route('airplane')
            ->withSuccess('Airplane was updated Successfully.');
    }

    public function delete($id) {

       $airplane = Airplane::find($id);
       $file_path = trim($airplane->image,'http://192.168.99.100:8080');
       File::delete($file_path);
       $airplane->delete();

       return redirect()
           ->route('airplanes')
           ->withSuccess('Airplane was Deleted Successfully');
    }
}
