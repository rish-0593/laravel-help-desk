<?php

namespace Rish0593\HelpDesk;

use Illuminate\Support\ServiceProvider;

class HelpDeskServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/helpdesk.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'HelpDesk');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->mergeConfigFrom(
            __DIR__.'/../config/helpdesk.php', 'HelpDesk'
        );

        $this->publishes([
            __DIR__.'/../config/helpdesk.php' => config_path('helpdesk.php'),
        ], 'config');
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
