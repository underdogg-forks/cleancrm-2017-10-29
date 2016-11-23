<?php

namespace Splate\Providers;

use Illuminate\Support\ServiceProvider;

class SplateServiceProvider extends ServiceProvider
{
    protected $usesApi = true;

    protected $details = [];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->details = config('splate.owner');

        // set default packages
        // set default payment gateway

        // load up configuration
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
