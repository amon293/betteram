<?php

namespace App\Jobs;

use App\Events\AirportWasCreated;
use App\Models\Airport;

/**
 * Class CreateAirportJob
 *
 * @package App\Jobs
 */
class CreateAirportJob
{

    /**
     * @var array
     */
    private $fields;

    /**
     * Create a new job instance.
     *
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = array_filter($fields);
    }

    /**
     * Execute the job.
     *
     * @param \App\Models\Airport $airport
     */
    public function handle(Airport $airport)
    {

        $airport = $airport->create($this->fields);

        /**
         * Announce AirportWasCreated
         */
        event(new AirportWasCreated($airport));
    }
}
