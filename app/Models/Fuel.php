<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fuel
 *
 * @package App\Models
 */
class Fuel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fuels';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date'];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return Builder
     */
    public function scopeNow(Builder $query) : Builder
    {

        $date = new Carbon();

        return $query
            ->whereMonth('date', '=', $date->month)
            ->whereDay('date', '=', $date->day)
            ->whereTime('date', '<=', $date->toTimeString());
    }
}
