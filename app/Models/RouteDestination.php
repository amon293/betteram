<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteDestination extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'route_destinations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function route()
    {
        return $this->belongsTo('App\Models\Route');
    }

    public function airport()
    {
        return $this->hasOne('App\Models\Airport');
    }
}
