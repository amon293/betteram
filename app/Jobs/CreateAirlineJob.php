<?php

namespace App\Jobs;

use App\Events\AirlineWasCreated;
use App\Models\Airline;
use App\Models\User;

/**
 * Class CreateAirlineJob
 *
 * @package App\Jobs
 */
class CreateAirlineJob
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var array
     */
    private $fields;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param array $fields
     */
    public function __construct(User $user, array $fields)
    {
        $this->user = $user;
        $this->fields = $fields;
    }

    /**
     * Execute the job.
     *
     * @param Airline $airline
     */
    public function handle(Airline $airline)
    {

        $airline = $airline->fill($this->fields);
        $airline->user()->associate($this->user);
        $airline->save();

        /*
         * Announce AirlineWasCreated
         */
        event(new AirlineWasCreated($airline));
    }
}
