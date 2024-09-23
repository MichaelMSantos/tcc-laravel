<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Camiseta;
use App\Models\Tecido;
use App\Models\Tinta;
use App\Observers\CamisetaObserver;
use App\Observers\TecidoObserver;
use App\Observers\TintaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Camiseta::observe(CamisetaObserver::class);
        Tecido::observe(TecidoObserver::class);
        Tinta::observe(TintaObserver::class);
    }
}
