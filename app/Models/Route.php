<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function destinations()
    {
        return $this->hasMany('App\Models\RouteDestination');
    }

    public function airport()
    {
        return $this->hasOne('App\Models\Airport');
    }

    public function airplane()
    {
        return $this->hasOne('App\Models\Airplane');
    }
}