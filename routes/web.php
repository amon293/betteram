<?php

/** @var \Illuminate\Routing\Router $router */

use App\Http\Controllers\AirlineController;
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


$router->get('create/airline', AirlineController::class . '@create')->name('airline.create');
