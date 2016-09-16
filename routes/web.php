<?php

/** @var \Illuminate\Routing\Router $router */

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

$router->group(['middleware' => 'auth'], function ($router) {

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

/**
 * Airplanes
 */
$router->get('airplanes', AirplaneController::class . '@index')->name('airplanes');
$router->get('create/airplane', AirplaneController::class . '@create')->name('airplane.create');
$router->post('create/airplane/store', AirplaneController::class . '@store')->name('airplane.store');
