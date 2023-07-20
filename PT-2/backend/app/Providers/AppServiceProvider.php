<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\CoderByteService;
use App\Services\Contracts\CoderByteServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CoderByteServiceInterface::class, CoderByteService::class);
    }
}
