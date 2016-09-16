<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Airline
 *
 * @package App\Models
 */
class Airline extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'airlines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
