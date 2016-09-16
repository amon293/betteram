<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufactureCreation;
use App\Jobs\CreateManufactureJob;
use App\Models\Manufacturer;

/**
 * Class ManufactureController
 *
 * @package App\Http\Controllers
 */
class ManufactureController extends Controller
{
    /**
     * @param \App\Models\Manufacturer $manufacture
     * @return \Illuminate\View\View
     */
    public function index(Manufacturer $manufacture)
    {
        return view('manufacture.index')->with('manufactures', $manufacture->all());
    }

    /**
     * Displays Create Manufacture Page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('manufacture.create');
    }

    /**
     * @param \App\Http\Requests\ManufactureCreation $request
     */
    public function store(ManufactureCreation $request)
    {

        $this->dispatch(new CreateManufactureJob(
            $request->input('name')
        ));

        return redirect()
            ->route('manufactures')
            ->withSuccess('Manufacture was Created Successfully.');
    }
}
