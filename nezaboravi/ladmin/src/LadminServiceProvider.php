<?php


namespace Nezaboravi\Ladmin;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class LadminServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'ladmin');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->publishes([__DIR__.'/public' => public_path('nezaboravi/'),], 'public');
        $this->publishes([__DIR__.'/database/migrations/' => database_path('migrations')], 'migrations');
        $this->publishes([__DIR__.'/database/seeds/' => database_path('seeds')], 'seeds');


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
