<?php

namespace App\Providers;

use App\DTOs\Binance\RestConfigDTO;
use App\Services\Binance\BinanceRestAPI;
use Illuminate\Foundation\Application as App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            BinanceRestAPI::class,
            fn (App $app) => new BinanceRestAPI(new RestConfigDTO(config('binance.rest')))
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [
            BinanceRestAPI::class
        ];
    }
}
