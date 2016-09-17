<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\CreateAirlineJob;
use Illuminate\Http\Request;

/**
 * Class AirlineController
 *
 * @package App\Http\Controllers\User
 */
class AirlineController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.airline.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {

        $this->dispatch(new CreateAirlineJob(
            $request->user(), $request->all()
        ));

        return redirect()
            ->route('home')
            ->withSuccess('You ready to start playing the game');
    }
}
