<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Airplane;

/**
 * Class ShoppingController
 *
 * @package App\Http\Controllers\User
 */
class ShoppingController extends Controller
{
    public function index(Airplane $airplane)
    {
        return view('user.shopping.index')->with('airplanes', $airplane->all());
    }
}
