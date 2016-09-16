<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Airplane
 *
 * @package App\Models
 */
class Airplane extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'airplanes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'model', 'size_class', 'price', 'capacity', 'fuel', 'cargo_load', 'range', 'cruise_speed', 'engine'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer() : BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

}
