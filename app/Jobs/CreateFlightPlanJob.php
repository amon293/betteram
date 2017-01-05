<?php

namespace App\Jobs;

use App\Events\FlightPlanWasCreated;
use App\Models\FlightPlan;
use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateFlightPlanJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var App\Models\Route
     */
    private $route;

    /**
     * @var Carbon\Carbon
     */
    private $departure;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Route $route, Carbon $departure)
    {
        $this->route = $route;
        $this->departure = $departure;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FlightPlan $flightPlan) : FlightPlan
    {
        $flightPlan->route()->associate($this->route);
        $flightPlan->departure = $this->departure;
        $flightPlan->arrived = clone $flightPlan->departure;
        $flightPlan->arrived->addSeconds((int)$flightPlan->route->flight_time);
        $flightPlan->pax_num = random_int(0, $flightPlan->route->airplane->capacity);

        $flightPlan->save();

        /**
         * Announce FlightPlanWasCreated
         */
        event(new FlightPlanWasCreated($flightPlan));

        return $flightPlan;
    }
}
