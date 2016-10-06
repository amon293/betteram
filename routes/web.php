<?php

/** @var \Illuminate\Routing\Router $router */

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ManufactureController;

$router->group(['middleware' => ['auth', 'test']], function ($router) {
    $router->get('/', function () { return view('index'); })->name('home');
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
$router->get('airline/{id}/edit', AirlineController::class . '@edit')->name('airline.edit');
$router->put('airline/{id}',AirlineController::class. '@update')->name('airline.update');
$router->delete('airline/{id}', AirlineController::class . '@delete')->name('airline.delete');

/**
 * Airplanes
 */
$router->get('airplanes', AirplaneController::class . '@index')->name('airplanes');
$router->get('create/airplane', AirplaneController::class . '@create')->name('airplane.create');
$router->post('create/airplane/store', AirplaneController::class . '@store')->name('airplane.store');
$router->get('airplane/{id}/edit', AirplaneController::class . '@edit')->name('airplane.edit');
$router->put('airplane/{id}',AirplaneController::class. '@update')->name('airplane.update');
$router->delete('airline/{id}',AirplaneController::class . '@delete')->name('airplane.delete');

/**
 * Airport
 */
$router->get('airports', AirportController::class . '@index')->name('airports');
$router->get('create/airport', AirportController::class . '@create')->name('airport.create');
$router->post('create/airport/store', AirportController::class . '@store')->name('airport.store');
$router->get('airport/{id}/edit', AirportController::class . '@edit')->name('airport.edit');
$router->put('airport/{id}',AirportController::class. '@update')->name('airport.update');
$router->delete('airport/{id}',AirportController::class . '@delete')->name('airport.delete');


/**
 * Manufacture
 */
$router->get('manufactures', ManufactureController::class . '@index')->name('manufactures');
$router->get('create/manufacture', ManufactureController::class . '@create')->name('manufacture.create');
$router->post('create/manufacture/store', ManufactureController::class . '@store')->name('manufacture.store');
