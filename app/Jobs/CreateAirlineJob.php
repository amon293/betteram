<?php

namespace App\Jobs;

use App\Events\AirlineWasCreated;
use App\Models\Airline;

/**
 * Class CreateAirlineJob
 *
 * @package App\Jobs
 */
class CreateAirlineJob
{

    /**
     * @var string
     */
    private $name;

    /**
     * Create a new job instance.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @param Airline $airline
     */
    public function handle(Airline $airline)
    {

        $airline = $airline->create([
            'name' => $this->name
        ]);

        /**
         * Announce AirlineWasCreated
         */
        event(new AirlineWasCreated($airline));
    }
}
