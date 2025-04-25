<?php

namespace Puneetxp\KvDb;

use Illuminate\Support\ServiceProvider;

class KvServiceProvider extends ServiceProvider
{
    use PublishesMigrations;
    public function boot()
    {
        $this->registerMigrations(__DIR__ . '/Migrations');

        $this->loadViewsFrom(__DIR__ . '/Views', 'kv-db');
    }

    public function register()
    {
        //
    }
}

