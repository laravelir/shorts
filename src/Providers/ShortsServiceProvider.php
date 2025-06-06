<?php

namespace Laravelir\Shorts\Providers;

use App\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravelir\Shorts\Console\Commands\InstallPackageCommand;
use Laravelir\Shorts\Facades\Shorts;

class ShortsServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/shorts.php", 'shorts');

        $this->registerFacades();
    }

    public function boot(): void
    {

        $this->registerCommands();
        $this->registerMigrations();
    }

    private function registerFacades()
    {
        $this->app->bind('shorts', function ($app) {
            return new Shorts();
        });
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallPackageCommand::class,
            ]);
        }
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/shorts.php' => config_path('shorts.php')
        ], 'shorts-config');
    }

    protected function registerMigrations()
    {
        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__ . '/../../database/migrations/create_shorts_table.php' => database_path() . "/migrations/{$timestamp}_create_shorts_tables.php",
        ], 'shorts-migrations');
    }
}
