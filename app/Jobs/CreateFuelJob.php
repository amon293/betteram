<?php

namespace App\Jobs;

use App\Models\Fuel;
use Carbon\Carbon;

/**
 * Class CreateFuelJob
 *
 * @package App\Jobs
 */
class CreateFuelJob
{
    /**
     * @var Carbon
     */
    private $date;

    /**
     * @var int
     */
    private $price;

    /**
     * Create a new job instance.
     *
     * @param Carbon $date
     * @param int $price
     */
    public function __construct(Carbon $date, int $price)
    {
        $this->date = $date;
        $this->price = $price;
    }

    /**
     * Execute the job.
     *
     * @param Fuel $fuel
     * @return Fuel
     */
    public function handle(Fuel $fuel) : fuel
    {
        return $fuel->create([
            'date' => $this->date,
            'price' => $this->price
        ]);
    }
}
