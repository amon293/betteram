<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Route
 *
 * @package App\Models
 */
class Route extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'routes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'economy_price', 'user_id','airline_id'];

    /**
     * Order Result Descending
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $field
     * @return mixed
     */
    public function scopeDesc(Builder $query, $field = 'id')
    {
        $query->orderBy($field, 'DESC');
    }

    public function airplane() : BelongsTo
    {
        return $this->belongsTo(Airplane::class);
    }

    public function fromAirport() : BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

    public function toAirport() : BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

}
