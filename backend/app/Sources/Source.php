<?php

namespace App\Sources;

use App\Sources\Support\BaseContracts\HttpRequestInterface;
use App\Sources\Support\BaseContracts\SourceInterface;

abstract class Source implements SourceInterface
{
    /**
     * The route for the API.
     * 
     * @var string
     */
    protected $route;

    /**
     * @var \app\Sources\Support\BaseContracts\HttpRequestInterface
     */
    protected $http;

    /**
     * Create the class instance and inject its dependency.
     * 
     * @param String $route
     * @param App\Sources\Support\BaseContracts\HttpRequestInterface $http
     */
    public function __construct(string $route, HttpRequestInterface $http)
    {
        $this->route = $route;
        $this->http = $http;
    }

    /**
     * Get the route for the API endpoint.
     * 
     * @return string
     */
    public function route()
    {
        return $this->route;
    }
}
