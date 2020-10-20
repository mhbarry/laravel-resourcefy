<?php

namespace Mhbarry\LaravelResourcefy;

use Illuminate\Support\ServiceProvider;

class LaravelResourcefyServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'mhbarry');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'mhbarry');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->app['router']->namespace('Mhbarry\\LaravelResourcefy\\Controllers')
            ->middleware(['api'])
            ->prefix('api')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
            });

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelresourcefy.php', 'laravelresourcefy');

        // Register the service the package provides.
        $this->app->singleton('laravelresourcefy', function ($app) {
            return new LaravelResourcefy;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelresourcefy'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelresourcefy.php' => config_path('laravelresourcefy.php'),
        ], 'laravelresourcefy.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/mhbarry'),
        ], 'laravelresourcefy.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/mhbarry'),
        ], 'laravelresourcefy.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/mhbarry'),
        ], 'laravelresourcefy.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
