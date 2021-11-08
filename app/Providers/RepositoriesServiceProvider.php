<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Auth\Login\LoginRepositories',
            'App\Repositories\Auth\Login\EloquentLoginRepositories',
        );

        $this->app->bind(
            'App\Repositories\Barang\BarangRepositories',
            'App\Repositories\Barang\EloquentBarangRepositories',
        );
        
    }
}
