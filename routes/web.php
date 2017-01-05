<?php

/** @var \Illuminate\Routing\Router $router */

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\FlightController;

$router->group(['middleware' => ['auth', 'test']], function ($router) {
    $router->get('/', function () {
        return view('index');
    })->name('home');
});

// Authentication Routes...
$router->get('login', LoginController::class . '@showLoginForm')->name('login');
$router->post('login', LoginController::class . '@login')->name('login.store');
$router->get('logout', LoginController::class . '@logout')->name('logout');

// Registration Routes...
$router->get('register', RegisterController::class . '@showRegistrationForm')->name('register');
$router->post('register', RegisterController::class . '@register')->name('register.store');

// Password Reset Routes...
$router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$router->post('password/reset', 'Auth\ResetPasswordController@reset');

/**
 * Airlines
 */
$router->get('airlines', AirlineController::class . '@index')->name('airlines');
$router->get('create/airline', AirlineController::class . '@create')->name('airline.create');
$router->post('create/airline/store', AirlineController::class . '@store')->name('airline.store');
$router->get('airline/{airline}/edit', AirlineController::class . '@edit')->name('airline.edit');
$router->put('airline/{airline}', AirlineController::class . '@update')->name('airline.update');
$router->delete('airline/{airline}', AirlineController::class . '@delete')->name('airline.delete');

/**
 * Airplanes
 */
$router->get('airplanes', AirplaneController::class . '@index')->name('airplanes');
$router->get('create/airplane', AirplaneController::class . '@create')->name('airplane.create');
$router->post('create/airplane/store', AirplaneController::class . '@store')->name('airplane.store');
$router->get('airplane/{airplane}/edit', AirplaneController::class . '@edit')->name('airplane.edit');
$router->put('airplane/{airplane}', AirplaneController::class . '@update')->name('airplane.update');
$router->delete('airline/{airplane}', AirplaneController::class . '@delete')->name('airplane.delete');
$router->get('airplane/{airplane}', AirplaneController::class . '@airplane')->name('airplane.airplane');

/**
 * Airport
 */
$router->get('airports', AirportController::class . '@index')->name('airports');
$router->get('create/airport', AirportController::class . '@create')->name('airport.create');
$router->post('create/airport/store', AirportController::class . '@store')->name('airport.store');
$router->get('airport/{airport}/edit', AirportController::class . '@edit')->name('airport.edit');
$router->put('airport/{airport}', AirportController::class . '@update')->name('airport.update');
$router->delete('airport/{airport}', AirportController::class . '@delete')->name('airport.delete');
$router->get('airport/{airport}/coordinates', AirportController::class . '@coordinates')->name('airport.coordinates');

/**
 * Manufacture
 */
$router->get('manufactures', ManufactureController::class . '@index')->name('manufactures');
$router->get('create/manufacture', ManufactureController::class . '@create')->name('manufacture.create');
$router->post('create/manufacture/store', ManufactureController::class . '@store')->name('manufacture.store');

/**
 * Fuel
 */
$router->get('fuel/market', FuelController::class . '@index')->name('fuel.market');

/**
 * Route
 */
$router->get('routes', RouteController::class . '@index')->name('routes');
$router->get('create/route', RouteController::class . '@create')->name('route.create');
$router->post('create/route/store', RouteController::class . '@store')->name('route.store');
$router->get('route/{route}/edit', RouteController::class . '@edit')->name('route.edit');
$router->put('route/{route}', RouteController::class . '@update')->name('route.update');
$router->delete('route/{route}', RouteController::class . '@delete')->name('route.delete');

/**
 * Flight Plan
 */
$router->post('flight/flynow/', FlightController::class . '@flynow')->name('flight.flynow');