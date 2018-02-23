<?php

namespace Bredi\Banner;

use Illuminate\Support\ServiceProvider;

class BannerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // $this->publishes([
        //     __DIR__ . '/views/controle/banner' => base_path('resources/views/controle/banner'),
        // ]);

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        // $this->loadRoutesFrom(__DIR__ . '/Routes/routes.php');

        // $this->loadViewsFrom(__DIR__ . '/views/controle/banner', 'banner');

        $this->publishes([
            __DIR__ . '/Controllers/Controle' => base_path('app/Http/Controllers/Controle'),
        ], 'controllers');

        $this->loadViewsFrom(__DIR__ . '/views/bredi', 'banner');

        $this->publishes([
            __DIR__ . '/views/bredi' => base_path('resources/views/bredi/controle/banner'),
        ], 'views');

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

        // $this->app->make('App\Http\Controllers\Controle\BannerController');

    }
}
