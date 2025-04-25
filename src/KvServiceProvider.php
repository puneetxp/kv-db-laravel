<?php

namespace Puneetxp\KvDb;

use Illuminate\Support\ServiceProvider;

class KvServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadViewsFrom(__DIR__ . '/Views', 'kv-db');
    }

    public function register()
    {
        //
    }
}
