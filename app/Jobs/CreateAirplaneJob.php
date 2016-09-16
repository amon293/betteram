<?php

namespace App\Jobs;

use App\Events\AirplaneWasCreated;
use App\Models\Airplane;
use Illuminate\Http\UploadedFile;

/**
 * Class CreateAirplaneJob
 *
 * @package App\Jobs
 */
class CreateAirplaneJob
{

    /**
     * @var \App\Jobs\File
     */
    private $image;

    /**
     * @var array
     */
    private $fields;

    /**
     * Create a new job instance.
     *
     * @param UploadedFile $image
     * @param array $fields
     */
    public function __construct(UploadedFile $image, array $fields)
    {
        $this->image = $image;
        $this->fields = array_filter($fields);
    }

    /**
     * Execute the job.
     *
     * @todo properly generate unique name for the airplane image
     * @param \App\Models\Airplane $airplane
     */
    public function handle(Airplane $airplane)
    {

        $airplane = $airplane->fill(
            $this->fields
        );

        $image = $this->image->move(
            'uploads', str_random(10) . '.' . $this->image->guessExtension()
        );

        $airplane->setAttribute('image', asset($image->getPathname()));
        $airplane->save();

        /**
         * Announce AirplaneWasCreated
         */
        event(new AirplaneWasCreated($airplane));
    }
}
