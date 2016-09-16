<?php

namespace App\Jobs;

use App\Events\ManufacturerWasCreated;
use App\Models\Manufacturer;

/**
 * Class CreateManufactureJob
 *
 * @package App\Jobs
 */
class CreateManufactureJob
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
     * @param \App\Models\Manufacturer $manufacturer
     */
    public function handle(Manufacturer $manufacturer)
    {

        $manufacturer = $manufacturer->create([
            'name' => $this->name
        ]);

        /**
         * Announce ManufacturerWasCreated
         */
        event(new ManufacturerWasCreated($manufacturer));
    }
}
