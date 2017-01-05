<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlightPlan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flight_plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['departure', 'arrived', 'pax_num'];

    /**
     * Get the route
     */
    public function route() : BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    /**
     * Return a Carbon instance of departure date
     */
    public function getDeparture() : Carbon {
        return new Carbon($this->departure);
    }

    /**
     * Return a Carbon instance of arrived date
     */
    public function getArrived() : Carbon {
        return new Carbon($this->arrived);
    }

}
