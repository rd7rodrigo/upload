<?php

namespace Bredi\Upload;

class UploadServiceProvider extends UploadServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // $this->loadMigrationsFrom(__DIR__ . '/migrations');

        // $this->loadRoutesFrom(__DIR__ . '/Routes/routes.php');

        // $this->loadViewsFrom(__DIR__ . '/views/controle/banner', 'banner');

        // $this->publishes([
        //     __DIR__ . '/views/controle' => base_path('resources/views/controle'),
        // ], 'views');

        // $this->publishes([
        //     __DIR__ . '/Controllers/Controle' => base_path('app/Http/Controllers/Controle'),
        // ], 'controllers');

        //     $this->publishes([
        //     __DIR__.'/../config/package.php' => config_path('package.php')
        // ], 'config');

        // $this->publishes([
        //     __DIR__ . '/views' => base_path('resources/views/controle/tags'),
        // ]);
        /*
        $this->publishes([
        __DIR__ . '/migrations/' => base_path('migrations/'),
        ]);*/
        // include __DIR__ . '/routes.php';

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // include __DIR__ . '/Routes/routes.php';
        // $this->app->make('Fhferreira\Tags\Controllers\TagsController');

        include __DIR__ . '/Routes/routes.php';

        $this->app->make('Bredi\Upload\Controllers\DashboardController');

        // $this->loadViewsFrom(__DIR__ . '/views/controle/banner', 'banner');
    }
}
