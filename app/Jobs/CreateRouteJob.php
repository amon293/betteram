<?php

namespace App\Jobs;

use App\Events\RouteWasCreated;
use App\Models\Airplane;
use App\Models\Airport;
use App\Models\Route;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class CreateRouteJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Airplane
     */
    protected $airplane;

    /**
     * @var Airport
     */
    protected $fromAirport;

    /**
     * @var Airport
     */
    protected $toAirport;

    /**
     * @var array
     */
    protected $fields;

    /**
     * Create a new job instance.
     *
     * @param Airplane $airplane
     * @param Airport $fromAirport
     * @param Airport $toAirport
     * @param array $fields
     */
    public function __construct(Airplane $airplane, Airport $fromAirport, Airport $toAirport, array $fields)
    {
        $this->airplane = $airplane;
        $this->fromAirport = $fromAirport;
        $this->toAirport = $toAirport;
        $this->fields = $fields;
    }

    /**
     * Execute the job.
     *
     * @param Route $route
     * @return Route
     */
    public function handle(Route $route) : Route
    {
        $route = $route->fill(
            $this->fields
        );

        $route->airplane()->associate($this->airplane);
        $route->fromAirport()->associate($this->fromAirport);
        $route->toAirport()->associate($this->toAirport);
        $route->user()->associate(Auth::user());

        $route->save();

        /**
         * Announce RouteWasCreated
         */
        event(new RouteWasCreated($route));

        return $route;
    }
}
