<?php

namespace App\Models;

use App\RouteDestination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    protected $fillable = ['name'];

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

    /**
     * Destinations Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destinations() : HasMany
    {
        return $this->hasMany(RouteDestination::class);
    }

    /**
     * Airport Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function airport() : HasOne
    {
        return $this->hasOne(Airport::class);
    }

    /**
     * Airplane Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function airplane() : HasOne
    {
        return $this->hasOne(Airplane::class);
    }
}
