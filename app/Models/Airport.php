<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Airport
 *
 * @package App\Models
 */
class Airport extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'airports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'fee', 'size', 'coordinates', 'iata'];

}
