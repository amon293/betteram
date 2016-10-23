<?php

namespace App\Jobs;

use App\Events\AirplaneWasCreated;
use App\Models\Airplane;
use App\Models\Manufacturer;
use Illuminate\Http\UploadedFile;

/**
 * Class CreateAirplaneJob
 *
 * @package App\Jobs
 */
class CreateAirplaneJob
{
    /**
     * @var UploadedFile
     */
    private $image;

    /**
     * @var Manufacturer
     */
    private $manufacturer;

    /**
     * @var array
     */
    private $fields;

    /**
     * Create a new job instance.
     *
     * @param UploadedFile $image
     * @param Manufacturer $manufacturer
     * @param array $fields
     */
    public function __construct(UploadedFile $image, Manufacturer $manufacturer, array $fields)
    {
        $this->image = $image;
        $this->manufacturer = $manufacturer;
        $this->fields = array_filter($fields);
    }

    /**
     * Execute the job.
     *
     * @todo properly generate unique name for the airplane image
     * @param Airplane $airplane
     * @return Airplane
     */
    public function handle(Airplane $airplane) : Airplane
    {

        $airplane = $airplane->fill(
            $this->fields
        );

        $image = $this->image->move(
            'uploads', str_random(10) . '.' . $this->image->guessExtension()
        );

        $airplane->setAttribute('image', asset($image->getPathname()));

        /**
         * Set Airplane Manufacturer
         */
        $airplane->manufacturer()->associate($this->manufacturer);

        $airplane->save();

        /**
         * Announce AirplaneWasCreated
         */
        event(new AirplaneWasCreated($airplane));

        return $airplane;
    }
}
