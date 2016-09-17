<?php

/** @var \Illuminate\Routing\Router $router */
use App\Http\Controllers\User\AirlineController;
use App\Http\Controllers\User\ShoppingController;

/**
 * Airlines
 */
$router->get('airline/create', AirlineController::class . '@create')->name('airline.create');
$router->post('airline/store', AirlineController::class . '@store')->name('airline.store');

$router->get('shopping/airplanes', ShoppingController::class . '@index')->name('shopping.index');
