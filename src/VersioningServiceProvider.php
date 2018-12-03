<?php

namespace Jersak\Versioning;

use Illuminate\Support\ServiceProvider;

class VersioningServiceProvider extends ServiceProvider
{

   /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands('Jersak\Versioning\Commands\GetGithubVersion');
    }
}
