<?php

namespace App\Providers;

use App\Models\Manufacturer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param \App\Models\Manufacturer $manufacturer
     */
    public function boot(Manufacturer $manufacturer)
    {

        $bindings = [
            'manufacturer' => Manufacturer::class
        ];

        foreach ($bindings as $name => $binding) {
            if ($id = $this->app['request']->get("{$name}_id")) {
                $this->app->instance($binding, $manufacturer->findOrFail($id));
            }
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
