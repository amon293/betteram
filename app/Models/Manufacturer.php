<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Manufacturer
 *
 * @package App\Models
 */
class Manufacturer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'manufactures';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function airplanes() : HasMany
    {
        return $this->hasMany(Airplane::class);
    }
}
