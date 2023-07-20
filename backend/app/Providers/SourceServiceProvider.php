<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Sources\Contracts\CoderByteSourceInterface;
use App\Sources\Support\BaseContracts\SourceInterface;
use App\Sources\Support\BaseContracts\HttpRequestInterface;
use App\Sources\Support\HttpRequest;
use App\Sources\CoderByteSource;
use App\Sources\Source;

class SourceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HttpRequestInterface::class, HttpRequest::class);
        $this->app->bind(SourceInterface::class, Source::class);

        $this->app->bind(CoderByteSourceInterface::class, CoderByteSource::class);
    }
}
