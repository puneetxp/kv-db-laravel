<?php

namespace Puneetxp\KvDb;

use Illuminate\Support\ServiceProvider;

class KvServiceProvider extends ServiceProvider
{
    use PublishesMigrations;
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/Migrations/2025_04_25_000001_create_enviroments_table.php' =>
                $this->app->databasePath('database/migrations/' . date('Y_m_d_His') . '_create_environments_table.php')
            ],
            'migrations'
        );
        //        $this->registerMigrations(__DIR__ . '/Migrations');
        $this->loadViewsFrom(__DIR__ . '/Views', 'kv-db');
    }


    public function register()
    {
        //
    }
}
