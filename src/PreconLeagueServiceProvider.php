<?php

namespace DavieJJ\PreconLeague;

use Illuminate\Support\ServiceProvider;

class PreconLeagueServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'PreconLeagueViews');
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
    }
}
