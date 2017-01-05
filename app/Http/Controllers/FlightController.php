<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightPlanCreation;
use App\Jobs\CreateFlightPlanJob;
use App\Models\Route;
use Carbon\Carbon;

class FlightController extends Controller
{
    /**
     * @param FlightPlanCreation $request
     */
    public function flynow(FlightPlanCreation $request)
    {
        $route = Route::find($request->route);

        $this->dispatch(new CreateFlightPlanJob(
            $route,
            Carbon::now()
        ));

        return redirect()
            ->route('routes')
            ->withSuccess('Flying!');
    }
}
